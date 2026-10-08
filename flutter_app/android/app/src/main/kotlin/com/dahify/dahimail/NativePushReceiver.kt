package com.dahify.dahimail

import android.app.KeyguardManager
import android.app.NotificationChannel
import android.app.NotificationManager
import android.app.PendingIntent
import android.content.Context
import android.content.Intent
import android.graphics.Bitmap
import android.graphics.BitmapFactory
import android.graphics.Color
import android.graphics.Canvas
import android.graphics.Paint
import android.graphics.Typeface
import android.media.AudioAttributes
import android.net.Uri
import android.os.Build
import androidx.core.app.NotificationManagerCompat
import androidx.core.app.NotificationCompat
import androidx.core.app.Person
import androidx.core.app.RemoteInput
import androidx.core.graphics.drawable.IconCompat
import com.dexterous.flutterlocalnotifications.ActionBroadcastReceiver
import io.flutter.plugins.firebase.messaging.FlutterFirebaseMessagingReceiver
import com.google.firebase.messaging.RemoteMessage
import org.json.JSONObject
import java.net.HttpURLConnection
import java.net.URL
import java.util.Calendar
import java.io.ByteArrayOutputStream
import android.widget.RemoteViews
import java.util.concurrent.Executors

/** Native posting runs before Flutter. FCM's service owns data-message delivery. */
open class NativePushReceiver : FlutterFirebaseMessagingReceiver() {
    override fun onReceive(context: Context, intent: Intent) {
        // Preserve FlutterFire's legacy notification tap bookkeeping. Data-only
        // calls/messages are handled by NativeMessagingService, exactly once.
        val extras = intent.extras ?: return
        if (RemoteMessage(extras).notification != null) forwardToFlutter(context, intent)
    }

    internal fun handleMessage(context: Context, intent: Intent) {
        val extras = intent.extras ?: return
        val data = extras.keySet().associateWith { extras.get(it)?.toString().orEmpty() }
        val type = data["type"]
        context.getSharedPreferences("native_push", Context.MODE_PRIVATE).edit()
            .putString("last_type", type ?: "unknown").putLong("last_received", System.currentTimeMillis()).apply()
        val id = data["call_id"]?.toIntOrNull()
        if (type == "call_cancel" && id != null) {
            // A delayed invitation cannot ring after its cancellation was seen.
            dismissCall(context, id)
            recordResult(context, "call_cancelled")
        }
        val locked = context.getSystemService(KeyguardManager::class.java).isKeyguardLocked
        val foreground = !locked && MainActivity.isResumed
        if (foreground) recordResult(context, "foreground")
        if (!foreground && (type == "call" || data["notification_layout"] == "v2")) {
            try {
                val shown = if (type == "call") showCall(context, data) else showAlert(context, data)
                if (shown) intent.putExtra("dm_native_shown", "1")
            } catch (_: Exception) {
                recordResult(context, "posting_failed")
                // Leave delivery to the existing Dart fallback if native posting fails.
            }
        }
        try {
            forwardToFlutter(context, intent)
        } catch (error: Exception) {
            // A Flutter startup failure must not crash the FCM delivery service
            // or remove the native alert already posted above.
            android.util.Log.w("DahimailPush", "Flutter handoff failed: ${error.javaClass.simpleName}")
        }
    }

    protected open fun forwardToFlutter(context: Context, intent: Intent) {
        super.onReceive(context, intent)
    }

    companion object {
        private val images = Executors.newSingleThreadExecutor()
        const val CALL_CLOSED = "com.dahify.dahimail.CALL_CLOSED"
        private const val CALL_CHANNEL = "dm_calls_v3"
        private const val ALERT_CHANNEL = "dm_alerts_v2"

        private fun recordResult(context: Context, result: String) {
            context.getSharedPreferences("native_push", Context.MODE_PRIVATE).edit().putString("last_result", result).apply()
        }

        private fun canPost(context: Context, channelId: String): Boolean {
            context.getSharedPreferences("native_push", Context.MODE_PRIVATE).edit().putString("last_channel", channelId).apply()
            if (!NotificationManagerCompat.from(context).areNotificationsEnabled()) {
                recordResult(context, "notifications_blocked"); return false
            }
            if (Build.VERSION.SDK_INT >= 26 && context.getSystemService(NotificationManager::class.java).getNotificationChannel(channelId)?.importance == NotificationManager.IMPORTANCE_NONE) {
                recordResult(context, "channel_blocked"); return false
            }
            return true
        }

        internal fun diagnostics(context: Context): Map<String, Any> {
            val prefs = context.getSharedPreferences("native_push", Context.MODE_PRIVATE)
            val manager = context.getSystemService(NotificationManager::class.java)
            val channelId = prefs.getString("last_channel", "") ?: ""
            return mapOf("device" to "${Build.MANUFACTURER} ${Build.MODEL} / Android ${Build.VERSION.RELEASE}", "enabled" to NotificationManagerCompat.from(context).areNotificationsEnabled(),
                "last_type" to (prefs.getString("last_type", "none") ?: "none"),
                "last_result" to (prefs.getString("last_result", "not_received") ?: "not_received"),
                "channel_importance" to (if (Build.VERSION.SDK_INT >= 26) manager.getNotificationChannel(channelId)?.importance ?: -1 else -1),
                "call_importance" to (if (Build.VERSION.SDK_INT >= 26) manager.getNotificationChannel(CALL_CHANNEL)?.importance ?: -1 else -1))
        }

        internal fun callExpiry(context: Context, id: Int): Long =
            context.getSharedPreferences("native_push", Context.MODE_PRIVATE).getLong("ringing_$id", 0)

        internal fun dismissCall(context: Context, id: Int) {
            context.getSharedPreferences("native_push", Context.MODE_PRIVATE).edit()
                .remove("ringing_$id").putLong("cancelled_$id", System.currentTimeMillis()).apply()
            context.getSystemService(NotificationManager::class.java).cancel(100000 + id)
            context.sendBroadcast(Intent(CALL_CLOSED).setPackage(context.packageName).putExtra("call_id", id))
        }

        internal fun callScreenIntent(context: Context, data: Map<String, String>): Intent =
            Intent(context, IncomingCallActivity::class.java).apply {
                flags = Intent.FLAG_ACTIVITY_NEW_TASK or Intent.FLAG_ACTIVITY_SINGLE_TOP
                this.data = Uri.parse("dahimail://incoming/${data["call_id"]}")
                putExtra("call_data", JSONObject(data).toString())
            }

        internal fun answerActivityIntent(context: Context, id: Int): Intent =
            Intent(context, MainActivity::class.java).apply {
                flags = Intent.FLAG_ACTIVITY_NEW_TASK or Intent.FLAG_ACTIVITY_SINGLE_TOP
                action = "SELECT_FOREGROUND_NOTIFICATION"
                data = Uri.parse("dahimail://notification/$id/call_accept")
                putExtra("notificationId", 100000 + id)
                putExtra("payload", "call_incoming:$id")
                putExtra("actionId", "call_accept")
                putExtra("cancelNotification", true)
            }

        internal fun declineIntent(context: Context, data: Map<String, String>): PendingIntent {
            val id = data["call_id"]!!.toInt()
            val intent = Intent(context, IncomingCallDeclineReceiver::class.java).apply {
                action = ActionBroadcastReceiver.ACTION_TAPPED
                this.data = Uri.parse("dahimail://incoming/$id/decline")
                putExtra("notificationId", 100000 + id)
                putExtra("payload", JSONObject(data).toString())
                putExtra("actionId", "call_decline_background")
                putExtra("cancelNotification", true)
            }
            return PendingIntent.getBroadcast(context, id, intent, PendingIntent.FLAG_UPDATE_CURRENT or PendingIntent.FLAG_IMMUTABLE)
        }

        private fun launch(context: Context, id: Int, payload: String, action: String? = null): PendingIntent {
            val intent = Intent(context, MainActivity::class.java).apply {
                flags = Intent.FLAG_ACTIVITY_NEW_TASK or Intent.FLAG_ACTIVITY_SINGLE_TOP
                this.action = if (action == null) "SELECT_NOTIFICATION" else "SELECT_FOREGROUND_NOTIFICATION"
                data = Uri.parse("dahimail://notification/$id/${action ?: "view"}")
                putExtra("notificationId", id)
                putExtra("payload", payload)
                putExtra("actionId", action)
                putExtra("cancelNotification", true)
            }
            return PendingIntent.getActivity(context, id, intent, PendingIntent.FLAG_UPDATE_CURRENT or PendingIntent.FLAG_IMMUTABLE)
        }

        private fun channel(context: Context, calls: Boolean, alertId: String = ALERT_CHANNEL, sound: String = "default", vibrate: Boolean = true) {
            if (Build.VERSION.SDK_INT < 26) return
            val id = if (calls) CALL_CHANNEL else alertId
            val manager = context.getSystemService(NotificationManager::class.java)
            if (manager.getNotificationChannel(id) != null) return
            val channel = NotificationChannel(id, if (calls) "Incoming calls" else "Messages & updates", NotificationManager.IMPORTANCE_HIGH).apply {
                enableVibration(if (calls) true else vibrate)
                enableLights(true)
                lightColor = Color.rgb(22, 163, 74)
                setShowBadge(true)
                lockscreenVisibility = if (calls) NotificationCompat.VISIBILITY_PUBLIC else NotificationCompat.VISIBILITY_PRIVATE
                if (!calls && sound == "silent") setSound(null, null)
                if (!calls && sound !in listOf("default", "silent")) {
                    val resource = context.resources.getIdentifier(sound, "raw", context.packageName)
                    if (resource != 0) setSound(Uri.parse("android.resource://${context.packageName}/$resource"), AudioAttributes.Builder().setUsage(AudioAttributes.USAGE_NOTIFICATION).build())
                }
                if (calls) setSound(Uri.parse("android.resource://${context.packageName}/${R.raw.tritone}"),
                    AudioAttributes.Builder().setUsage(AudioAttributes.USAGE_NOTIFICATION_RINGTONE).build())
            }
            manager.createNotificationChannel(channel)
        }

        internal fun showCall(context: Context, data: Map<String, String>): Boolean {
            val callId = data["call_id"]?.toIntOrNull() ?: return false
            val sent = data["sent_at"]?.toLongOrNull() ?: return false
            val postedAt = System.currentTimeMillis()
            val remaining = (sent + (data["ttl"]?.toLongOrNull() ?: 45)) * 1000 - System.currentTimeMillis()
            val preferences = context.getSharedPreferences("native_push", Context.MODE_PRIVATE)
            if (remaining <= 0 || preferences.getLong("cancelled_$callId", 0) >= sent * 1000) { recordResult(context, "call_expired_or_cancelled"); return true }
            // Bound retained cancellation markers to the short call delivery window.
            preferences.all.filter { it.key.startsWith("cancelled_") && (it.value as? Long ?: 0) < System.currentTimeMillis() - 120000 }
                .keys.forEach { preferences.edit().remove(it).apply() }
            // Redelivery/handoff must not restart ringing or launch a second screen.
            if (callExpiry(context, callId) > postedAt && context.getSystemService(NotificationManager::class.java)
                    .activeNotifications.any { it.id == 100000 + callId }) return true
            channel(context, true)
            if (!canPost(context, CALL_CHANNEL)) return true
            val id = 100000 + callId
            val open = PendingIntent.getActivity(context, id, callScreenIntent(context, data), PendingIntent.FLAG_UPDATE_CURRENT or PendingIntent.FLAG_IMMUTABLE)
            val accept = PendingIntent.getActivity(context, id, answerActivityIntent(context, callId), PendingIntent.FLAG_UPDATE_CURRENT or PendingIntent.FLAG_IMMUTABLE)
            val decline = declineIntent(context, data)
            val name = data["caller_name"].orEmpty().ifBlank { "Someone" }
            val video = data["video"] in listOf("1", "true") && data["audio_only"] !in listOf("1", "true")
            val label = if (data["group"] in listOf("1", "true")) "Meeting invitation" else if (video) "Incoming video call" else "Incoming audio call"
            val builder = NotificationCompat.Builder(context, CALL_CHANNEL)
                .setLargeIcon(avatarPlaceholder(name))
                .setSmallIcon(R.drawable.ic_stat_notify).setContentTitle(name).setContentText(label).setSubText("Call")
                .setPriority(NotificationCompat.PRIORITY_MAX).setCategory(NotificationCompat.CATEGORY_CALL)
                .setVisibility(NotificationCompat.VISIBILITY_PUBLIC).setOngoing(true).setAutoCancel(false)
                .setTimeoutAfter(remaining.coerceAtMost(45000)).setFullScreenIntent(open, true).setContentIntent(open)
                .setSound(Uri.parse("android.resource://${context.packageName}/${R.raw.tritone}"))
                .setDefaults(NotificationCompat.DEFAULT_VIBRATE or NotificationCompat.DEFAULT_LIGHTS)
            if (Build.VERSION.SDK_INT >= 31) {
                builder.setStyle(NotificationCompat.CallStyle.forIncomingCall(
                    Person.Builder().setName(name).setIcon(IconCompat.createWithBitmap(avatarPlaceholder(name))).setImportant(true).build(), decline, accept).setIsVideo(video))
            } else {
                builder.addAction(0, "Decline", decline).addAction(0, "Accept", accept)
            }
            val notification = builder.build().apply { flags = flags or android.app.Notification.FLAG_INSISTENT }
            val manager = context.getSystemService(NotificationManager::class.java)
            preferences.edit().putLong("ringing_$callId", postedAt + remaining.coerceAtMost(45000)).apply()
            manager.notify(id, notification)
            recordResult(context, "posted_call")
            val avatar = data["caller_avatar"].orEmpty()
            if (avatar.startsWith("https://")) images.execute {
                val bitmap = fetchAvatar(avatar) ?: return@execute
                val timeout = remaining - (System.currentTimeMillis() - postedAt)
                if (timeout <= 0 || manager.activeNotifications.none { it.id == id }) return@execute
                builder.setLargeIcon(bitmap).setOnlyAlertOnce(true).setTimeoutAfter(timeout.coerceAtMost(45000))
                if (Build.VERSION.SDK_INT >= 31) builder.setStyle(NotificationCompat.CallStyle.forIncomingCall(
                    Person.Builder().setName(name).setIcon(IconCompat.createWithBitmap(bitmap)).setImportant(true).build(), decline, accept).setIsVideo(video))
                manager.notify(id, builder.build().apply { flags = flags or android.app.Notification.FLAG_INSISTENT })
            }
            return true
        }

        internal fun showAlert(context: Context, data: Map<String, String>): Boolean {
            if (data["title"].isNullOrBlank()) return false
            val prefs = context.getSharedPreferences("FlutterSharedPreferences", Context.MODE_PRIVATE)
            val type = data["type"].orEmpty()
            val category = if (Regex("billing|payment|plan|trial").containsMatchIn(type)) "billing"
                else if (Regex("message|conversation|reply|email|chat|inbox|friend|mail").containsMatchIn(type)) "messages" else "activity"
            if (!prefs.getBoolean("flutter.n_enabled", true) || !prefs.getBoolean("flutter.n_$category", true)) { recordResult(context, "muted_in_app"); return true }
            if (prefs.getBoolean("flutter.q_enabled", false)) {
                val now = Calendar.getInstance()
                val minute = now.get(Calendar.HOUR_OF_DAY) * 60 + now.get(Calendar.MINUTE)
                val start = prefs.getLong("flutter.q_start", 1320).toInt()
                val end = prefs.getLong("flutter.q_end", 420).toInt()
                if (if (start <= end) minute in start until end else minute >= start || minute < end) { recordResult(context, "quiet_hours"); return true }
            }
            val sound = prefs.getString("flutter.n_sound_id", if (prefs.getBoolean("flutter.n_sound", true)) "default" else "silent") ?: "default"
            val vibrate = prefs.getBoolean("flutter.n_vibrate", true)
            val channelId = "${ALERT_CHANNEL}_${category}_${sound}_$vibrate"
            channel(context, false, channelId, sound, vibrate)
            if (!canPost(context, channelId)) return true
            val key = data["notification_id"].takeUnless { it.isNullOrBlank() }
                ?: data["message_id"].takeUnless { it.isNullOrBlank() } ?: data["google.message_id"] ?: return false
            val id = key.hashCode() and 0x7fffffff
            val payload = JSONObject(data).toString()
            val view = launch(context, id, payload)
            val label = when (type) {
                "email_received", "new_email" -> "New email"
                "friend_request" -> "Friend request"
                "friend_accepted" -> "Friend request accepted"
                "friend_suggestion" -> "Friend suggestion"
                else -> data["category_label"].orEmpty().ifBlank { "Update" }
            }
            val body = when (type) {
                "friend_request" -> "Sent you a friend request"
                "friend_accepted" -> "Accepted your friend request"
                else -> data["body"].orEmpty()
            }
            val sender = data["sender_name"].orEmpty().ifBlank { data["title"].orEmpty() }
            val compact = messageView(context, label, sender, body, false)
            val expanded = messageView(context, label, sender, body, true)
            val builder = NotificationCompat.Builder(context, channelId)
                .setLargeIcon(avatarPlaceholder(sender))
                .setSmallIcon(R.drawable.ic_stat_notify).setSubText(label)
                .setContentTitle(sender).setContentText(body)
                .setStyle(NotificationCompat.DecoratedCustomViewStyle())
                .setCustomContentView(compact).setCustomBigContentView(expanded)
                .setCustomHeadsUpContentView(compact)
                .setPriority(NotificationCompat.PRIORITY_HIGH).setVisibility(NotificationCompat.VISIBILITY_PRIVATE)
                .setAutoCancel(true).setContentIntent(view).setOnlyAlertOnce(true)
                .setDefaults(NotificationCompat.DEFAULT_LIGHTS or (if (vibrate) NotificationCompat.DEFAULT_VIBRATE else 0) or
                    (if (sound == "default") NotificationCompat.DEFAULT_SOUND else 0))
                .setCategory(if (data["reply_kind"] != null) NotificationCompat.CATEGORY_MESSAGE else NotificationCompat.CATEGORY_EVENT)
                .addAction(0, "View", view)
            if (sound !in listOf("default", "silent")) {
                val resource = context.resources.getIdentifier(sound, "raw", context.packageName)
                if (resource != 0) builder.setSound(Uri.parse("android.resource://${context.packageName}/$resource"))
            }
            if (data["reply_kind"] in listOf("friend", "conversation") && data["reply_id"]?.toIntOrNull() != null) {
                val replyIntent = Intent(context, ActionBroadcastReceiver::class.java).apply {
                    action = ActionBroadcastReceiver.ACTION_TAPPED
                    this.data = Uri.parse("dahimail://notification/$id/reply")
                    putExtra("notificationId", id)
                    putExtra("payload", payload)
                    putExtra("actionId", "notification_reply")
                    putExtra("cancelNotification", false)
                }
                val mutable = if (Build.VERSION.SDK_INT >= 31) PendingIntent.FLAG_MUTABLE else 0
                val reply = PendingIntent.getBroadcast(context, id, replyIntent, PendingIntent.FLAG_UPDATE_CURRENT or mutable)
                builder.addAction(NotificationCompat.Action.Builder(0, "Reply", reply)
                    .addRemoteInput(RemoteInput.Builder("FlutterLocalNotificationsPluginInputResult").setLabel("Reply").build())
                    .setSemanticAction(NotificationCompat.Action.SEMANTIC_ACTION_REPLY).setShowsUserInterface(false).build())
            }
            val manager = context.getSystemService(NotificationManager::class.java)
            manager.notify(id, builder.build())
            recordResult(context, "posted_alert")
            // Avatar is optional. Never delay the alert or resurrect a dismissed one.
            val avatar = data["sender_avatar"].orEmpty()
            if (avatar.startsWith("https://")) images.execute {
                val bitmap = fetchAvatar(avatar) ?: return@execute
                if (manager.activeNotifications.any { it.id == id && it.notification.extras.getCharSequence(android.app.Notification.EXTRA_TEXT)?.toString() == body }) {
                    compact.setImageViewBitmap(R.id.notification_avatar, bitmap)
                    expanded.setImageViewBitmap(R.id.notification_avatar, bitmap)
                    manager.notify(id, builder.setLargeIcon(bitmap).build())
                }
            }
            return true
        }

        private fun messageView(context: Context, label: String, sender: String, body: String, expanded: Boolean): RemoteViews =
            RemoteViews(context.packageName, R.layout.notification_message).apply {
                setTextViewText(R.id.notification_category, label)
                setTextViewText(R.id.notification_sender, sender)
                setTextViewText(R.id.notification_body, body)
                setInt(R.id.notification_body, "setMaxLines", if (expanded) 5 else 1)
                setImageViewBitmap(R.id.notification_avatar, avatarPlaceholder(sender))
            }

        internal fun avatarPlaceholder(name: String): Bitmap {
            val bitmap = Bitmap.createBitmap(128, 128, Bitmap.Config.ARGB_8888)
            val canvas = Canvas(bitmap)
            val paint = Paint(Paint.ANTI_ALIAS_FLAG).apply { color = Color.rgb(28, 115, 94) }
            canvas.drawCircle(64f, 64f, 64f, paint)
            val initials = name.trim().split(Regex("\\s+")).filter { it.isNotEmpty() }.take(2).map { it.take(1) }.joinToString("").uppercase().ifBlank { "D" }
            paint.color = Color.WHITE; paint.textSize = 48f; paint.textAlign = Paint.Align.CENTER; paint.typeface = Typeface.DEFAULT_BOLD
            canvas.drawText(initials, 64f, 64f - (paint.ascent() + paint.descent()) / 2, paint)
            return bitmap
        }

        internal fun fetchAvatar(avatar: String): Bitmap? {
            var connection: HttpURLConnection? = null
            try {
                connection = URL(avatar).openConnection() as HttpURLConnection
                connection.connectTimeout = 1500; connection.readTimeout = 1500
                connection.instanceFollowRedirects = false
                if (connection.responseCode != 200 || !connection.contentType.orEmpty().startsWith("image/")) return null
                val bytes = connection.inputStream.use { input ->
                    val out = ByteArrayOutputStream()
                    val buffer = ByteArray(8192)
                    while (out.size() <= 1024 * 1024) {
                        val count = input.read(buffer)
                        if (count < 0) break
                        out.write(buffer, 0, count)
                    }
                    out.toByteArray()
                }
                if (bytes.size > 1024 * 1024) return null
                val bounds = BitmapFactory.Options().apply { inJustDecodeBounds = true }
                BitmapFactory.decodeByteArray(bytes, 0, bytes.size, bounds)
                val options = BitmapFactory.Options().apply { inSampleSize = maxOf(1, maxOf(bounds.outWidth, bounds.outHeight) / 128) }
                return BitmapFactory.decodeByteArray(bytes, 0, bytes.size, options)
            } catch (_: Exception) { return null }
            finally { connection?.disconnect() }
        }

    }
}
