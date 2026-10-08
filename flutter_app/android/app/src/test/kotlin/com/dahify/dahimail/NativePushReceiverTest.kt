package com.dahify.dahimail

import android.app.Application
import android.app.Notification
import android.app.NotificationManager
import android.content.Context
import androidx.core.app.NotificationCompat
import org.junit.Assert.*
import org.junit.Before
import org.junit.Test
import org.junit.runner.RunWith
import org.robolectric.RobolectricTestRunner
import org.robolectric.RuntimeEnvironment
import org.robolectric.Robolectric
import android.view.View
import android.view.ViewGroup
import android.widget.Button
import android.widget.TextView
import java.time.Duration
import org.robolectric.Shadows.shadowOf
import org.robolectric.annotation.Config

@RunWith(RobolectricTestRunner::class)
@Config(sdk = [33], application = Application::class)
class NativePushReceiverTest {
    private lateinit var context: Context
    private lateinit var manager: NotificationManager
    private fun call(sent: Long = System.currentTimeMillis() / 1000) = mapOf(
        "call_id" to "42", "sent_at" to "$sent", "ttl" to "45", "caller_name" to "Alice Example", "video" to "1")

    @Before fun setup() {
        context = RuntimeEnvironment.getApplication()
        manager = context.getSystemService(NotificationManager::class.java)
        manager.cancelAll()
        context.getSharedPreferences("native_push", Context.MODE_PRIVATE).edit().clear().commit()
        context.getSharedPreferences("FlutterSharedPreferences", Context.MODE_PRIVATE).edit().clear().commit()
    }

    @Test fun incomingCallPostsWithoutFlutterAndCarriesActionPayload() {
        assertTrue(NativePushReceiver.showCall(context, call()))
        val alert = manager.activeNotifications.single().notification
        assertEquals(Notification.CATEGORY_CALL, alert.category)
        assertEquals("Alice Example", alert.extras.getCharSequence(Notification.EXTRA_TITLE).toString())
        assertNotNull(alert.fullScreenIntent)
        assertTrue(alert.flags and Notification.FLAG_INSISTENT != 0)
        val launch = shadowOf(alert.fullScreenIntent).savedIntent
        assertEquals(IncomingCallActivity::class.java.name, launch.component?.className)
        assertTrue(launch.getStringExtra("call_data")!!.contains("Alice Example"))
        val actions = alert.actions.map { shadowOf(it.actionIntent).savedIntent.getStringExtra("actionId") }
        assertTrue(actions.containsAll(listOf("call_accept", "call_decline_background")))
        assertEquals(NotificationManager.IMPORTANCE_HIGH, manager.getNotificationChannel("dm_calls_v3").importance)
    }

    private fun views(view: View): List<View> = listOf(view) + if (view is ViewGroup) (0 until view.childCount).flatMap { views(view.getChildAt(it)) } else emptyList()

    @Test fun nativeScreenShowsCallerAndAnswerBeforeFlutterStarts() {
        val data = call()
        NativePushReceiver.showCall(context, data)
        val controller = Robolectric.buildActivity(IncomingCallActivity::class.java, NativePushReceiver.callScreenIntent(context, data)).setup()
        val activity = controller.get()
        val children = views(activity.window.decorView)
        assertTrue(children.filterIsInstance<TextView>().any { it.text == "Alice Example" })
        assertTrue(children.filterIsInstance<TextView>().any { it.text == "Incoming video call" })
        children.filterIsInstance<Button>().single { it.text == "Answer" }.performClick()
        val answer = shadowOf(activity).nextStartedActivity
        assertEquals(MainActivity::class.java.name, answer.component?.className)
        assertEquals("call_accept", answer.getStringExtra("actionId"))
        assertEquals("call_incoming:42", answer.getStringExtra("payload"))
        assertEquals(0, manager.activeNotifications.size)
        assertTrue(activity.isFinishing)
        controller.pause().stop().destroy()
    }

    @Test fun cancellationClosesNativeScreenAndExpiredIntentCannotReopenIt() {
        val data = call()
        NativePushReceiver.showCall(context, data)
        val controller = Robolectric.buildActivity(IncomingCallActivity::class.java, NativePushReceiver.callScreenIntent(context, data)).setup()
        NativePushReceiver.dismissCall(context, 42)
        shadowOf(android.os.Looper.getMainLooper()).idle()
        assertTrue(controller.get().isFinishing)
        controller.pause().stop().destroy()
        val expired = Robolectric.buildActivity(IncomingCallActivity::class.java, NativePushReceiver.callScreenIntent(context, data)).create()
        assertTrue(expired.get().isFinishing)
        expired.destroy()
    }

    @Test fun nativeScreenClosesAtOriginalDeadline() {
        val data = call(System.currentTimeMillis() / 1000 - 40)
        NativePushReceiver.showCall(context, data)
        val controller = Robolectric.buildActivity(IncomingCallActivity::class.java, NativePushReceiver.callScreenIntent(context, data)).setup()
        shadowOf(android.os.Looper.getMainLooper()).idleFor(Duration.ofSeconds(6))
        assertTrue(controller.get().isFinishing)
        controller.pause().stop().destroy()
    }

    @Test fun declineUsesBackgroundReceiverWithoutOpeningFlutterActivity() {
        val pending = NativePushReceiver.declineIntent(context, call() + mapOf("recipient_user_id" to "1"))
        val action = shadowOf(pending)
        assertTrue(action.isBroadcastIntent)
        assertEquals(IncomingCallDeclineReceiver::class.java.name, action.savedIntent.component?.className)
        assertEquals("call_decline_background", action.savedIntent.getStringExtra("actionId"))
        assertTrue(action.savedIntent.getStringExtra("payload")!!.contains("recipient_user_id"))
    }

    @Test @Config(sdk = [25]) fun preChannelPhonesAlsoReceiveAudibleHeadsUpMessages() {
        NativePushReceiver.showAlert(context, mapOf("notification_id" to "legacy", "type" to "chat", "title" to "Alice", "body" to "Hello"))
        val alert = manager.activeNotifications.single().notification
        assertEquals(Notification.PRIORITY_HIGH, alert.priority)
        assertTrue(alert.defaults and Notification.DEFAULT_SOUND != 0)
        assertTrue(alert.defaults and Notification.DEFAULT_VIBRATE != 0)
    }

    @Test fun expiredAndAlreadyCancelledCallsCannotRing() {
        assertTrue(NativePushReceiver.showCall(context, call(System.currentTimeMillis() / 1000 - 60)))
        assertEquals(0, manager.activeNotifications.size)
        context.getSharedPreferences("native_push", Context.MODE_PRIVATE).edit().putLong("cancelled_42", System.currentTimeMillis()).commit()
        assertTrue(NativePushReceiver.showCall(context, call()))
        assertEquals(0, manager.activeNotifications.size)
    }

    @Test fun messageHasBrandCategorySenderAndInlineReply() {
        val data = mapOf("notification_id" to "msg-1", "type" to "chat", "title" to "New message", "sender_name" to "Alice Example",
            "body" to "Hello there", "category_label" to "Chat", "reply_kind" to "friend", "reply_id" to "2", "recipient_user_id" to "1")
        assertTrue(NativePushReceiver.showAlert(context, data))
        val alert = manager.activeNotifications.single().notification
        assertEquals(R.drawable.ic_stat_notify, alert.smallIcon.resId)
        assertNotNull(alert.getLargeIcon())
        assertEquals("Chat", alert.extras.getCharSequence(Notification.EXTRA_SUB_TEXT).toString())
        assertEquals("Alice Example", alert.extras.getCharSequence(Notification.EXTRA_TITLE).toString())
        assertEquals("Hello there", alert.extras.getCharSequence(Notification.EXTRA_TEXT).toString())
        val reply = alert.actions.single { it.title == "Reply" }
        assertEquals("FlutterLocalNotificationsPluginInputResult", reply.remoteInputs.single().resultKey)
        assertEquals("notification_reply", shadowOf(reply.actionIntent).savedIntent.getStringExtra("actionId"))
        assertEquals("com.dexterous.flutterlocalnotifications.ActionBroadcastReceiver", shadowOf(reply.actionIntent).savedIntent.component?.className)
        assertTrue(alert.actions.any { it.title == "View" })
        assertEquals(NotificationCompat.CATEGORY_MESSAGE, alert.category)
    }

    @Test fun disabledMessagesSuppressAlertsAndMissedCallsHaveNoReply() {
        val data = mapOf("notification_id" to "msg-2", "type" to "chat", "title" to "New message")
        context.getSharedPreferences("FlutterSharedPreferences", Context.MODE_PRIVATE).edit().putBoolean("flutter.n_messages", false).commit()
        assertTrue(NativePushReceiver.showAlert(context, data))
        assertEquals(0, manager.activeNotifications.size)
        assertTrue(NativePushReceiver.showAlert(context, data + mapOf("type" to "missed_call")))
        assertEquals(listOf("View"), manager.activeNotifications.single().notification.actions.map { it.title })
    }
    @Test fun quietHoursMuteAlertsButUrgentCallsStillRing() {
        context.getSharedPreferences("FlutterSharedPreferences", Context.MODE_PRIVATE).edit()
            .putBoolean("flutter.q_enabled", true).putLong("flutter.q_start", 0).putLong("flutter.q_end", 1440).commit()
        assertTrue(NativePushReceiver.showAlert(context, mapOf("notification_id" to "quiet", "type" to "chat", "title" to "Alice")))
        assertEquals(0, manager.activeNotifications.size)
        assertEquals("quiet_hours", NativePushReceiver.diagnostics(context)["last_result"])
        assertTrue(NativePushReceiver.showCall(context, call()))
        assertEquals(Notification.CATEGORY_CALL, manager.activeNotifications.single().notification.category)
    }

    @Test fun silentSoundAndVibrationPreferencesApplyToBackgroundChannel() {
        context.getSharedPreferences("FlutterSharedPreferences", Context.MODE_PRIVATE).edit()
            .putString("flutter.n_sound_id", "silent").putBoolean("flutter.n_vibrate", false).commit()
        assertTrue(NativePushReceiver.showAlert(context, mapOf("notification_id" to "silent", "type" to "chat", "title" to "Alice")))
        val alert = manager.activeNotifications.single().notification
        val channel = manager.getNotificationChannel(alert.channelId)
        assertNull(channel.sound)
        assertFalse(channel.shouldVibrate())
        assertEquals(NotificationManager.IMPORTANCE_HIGH, channel.importance)
    }

    @Test fun blockedNotificationsExplainWhyNoBannerWasPosted() {
        shadowOf(manager).setNotificationsEnabled(false)
        assertTrue(NativePushReceiver.showCall(context, call()))
        assertEquals(0, manager.activeNotifications.size)
        assertEquals("notifications_blocked", NativePushReceiver.diagnostics(context)["last_result"])
        assertEquals(false, NativePushReceiver.diagnostics(context)["enabled"])
    }

    @Test fun blockedCallChannelIsReportedWithoutPosting() {
        manager.createNotificationChannel(android.app.NotificationChannel("dm_calls_v3", "Incoming calls", NotificationManager.IMPORTANCE_NONE))
        assertTrue(NativePushReceiver.showCall(context, call()))
        assertEquals(0, manager.activeNotifications.size)
        assertEquals("channel_blocked", NativePushReceiver.diagnostics(context)["last_result"])
        assertEquals(0, NativePushReceiver.diagnostics(context)["call_importance"])
    }

    @Test fun successfulPostIsDistinguishedFromNoPushReceived() {
        assertEquals("not_received", NativePushReceiver.diagnostics(context)["last_result"])
        NativePushReceiver.showAlert(context, mapOf("notification_id" to "test", "title" to "Test"))
        assertEquals("posted_alert", NativePushReceiver.diagnostics(context)["last_result"])
        assertEquals(4, NativePushReceiver.diagnostics(context)["channel_importance"])
    }

    @Test fun bannerRendersCategoryAboveNameAndContentWithBrandAndAvatar() {
        NativePushReceiver.showAlert(context, mapOf("notification_id" to "friend-1", "type" to "friend_request",
            "title" to "New request", "sender_name" to "Alice Example", "body" to "Open Friends"))
        val notification = manager.activeNotifications.single().notification
        val view = notification.contentView.apply(context, android.widget.FrameLayout(context))
        assertEquals("Friend request", view.findViewById<TextView>(R.id.notification_category).text.toString())
        assertEquals("Alice Example", view.findViewById<TextView>(R.id.notification_sender).text.toString())
        assertEquals("Sent you a friend request", view.findViewById<TextView>(R.id.notification_body).text.toString())
        assertNotNull(view.findViewById<android.widget.ImageView>(R.id.notification_brand).drawable)
        assertNotNull(view.findViewById<android.widget.ImageView>(R.id.notification_avatar).drawable)
        assertNotNull(notification.headsUpContentView)
        assertNotNull(notification.bigContentView)
        assertEquals(listOf("View"), notification.actions.map { it.title })
    }

}
