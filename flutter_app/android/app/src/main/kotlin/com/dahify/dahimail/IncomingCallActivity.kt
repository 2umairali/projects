package com.dahify.dahimail

import android.app.Activity
import android.content.BroadcastReceiver
import android.content.Context
import android.content.Intent
import android.content.IntentFilter
import android.graphics.Color
import android.graphics.Typeface
import android.graphics.drawable.GradientDrawable
import android.os.Build
import android.os.Bundle
import android.os.Handler
import android.os.Looper
import android.view.Gravity
import android.view.WindowManager
import android.widget.Button
import android.widget.ImageView
import android.widget.LinearLayout
import android.widget.ScrollView
import android.widget.TextView
import androidx.core.content.ContextCompat
import org.json.JSONObject
import java.util.concurrent.Executors

/** The ringing screen has no Flutter dependency. Only Answer starts the app. */
class IncomingCallActivity : Activity() {
    private val handler = Handler(Looper.getMainLooper())
    private var callId = -1
    private var expiresAt = 0L
    private var responding = false
    private var registered = false
    private var callData: Map<String, String> = emptyMap()
    private val closed = object : BroadcastReceiver() {
        override fun onReceive(context: Context, intent: Intent) {
            if (intent.getIntExtra("call_id", -1) == callId) finish()
        }
    }
    private val timeout = Runnable { finish() }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        window.addFlags(WindowManager.LayoutParams.FLAG_KEEP_SCREEN_ON or WindowManager.LayoutParams.FLAG_SECURE)
        if (Build.VERSION.SDK_INT >= 27) {
            setShowWhenLocked(true)
            setTurnScreenOn(true)
        } else {
            @Suppress("DEPRECATION")
            window.addFlags(WindowManager.LayoutParams.FLAG_SHOW_WHEN_LOCKED or WindowManager.LayoutParams.FLAG_TURN_SCREEN_ON)
        }
        ContextCompat.registerReceiver(this, closed, IntentFilter(NativePushReceiver.CALL_CLOSED), ContextCompat.RECEIVER_NOT_EXPORTED)
        registered = true
        display(intent)
    }

    override fun onNewIntent(intent: Intent) {
        super.onNewIntent(intent)
        setIntent(intent)
        display(intent)
    }

    private fun display(intent: Intent) {
        handler.removeCallbacks(timeout)
        val json = try { JSONObject(intent.getStringExtra("call_data") ?: "{}") } catch (_: Exception) { finish(); return }
        callData = json.keys().asSequence().associateWith { json.optString(it) }
        callId = callData["call_id"]?.toIntOrNull() ?: -1
        expiresAt = NativePushReceiver.callExpiry(this, callId)
        if (callId <= 0 || expiresAt <= System.currentTimeMillis()) { finish(); return }
        responding = false
        handler.postDelayed(timeout, expiresAt - System.currentTimeMillis())
        val name = callData["caller_name"].orEmpty().ifBlank { "Someone" }
        val video = callData["video"] in listOf("1", "true") && callData["audio_only"] !in listOf("1", "true")
        val label = if (callData["group"] in listOf("1", "true")) "Incoming meeting invitation" else if (video) "Incoming video call" else "Incoming audio call"
        val root = LinearLayout(this).apply {
            orientation = LinearLayout.VERTICAL
            gravity = Gravity.CENTER_HORIZONTAL
            fitsSystemWindows = true
            setPadding(dp(24), dp(24), dp(24), dp(32))
            background = GradientDrawable(GradientDrawable.Orientation.TOP_BOTTOM, intArrayOf(Color.rgb(20, 54, 50), Color.rgb(9, 21, 25)))
        }
        val brand = LinearLayout(this).apply { gravity = Gravity.CENTER; orientation = LinearLayout.HORIZONTAL }
        brand.addView(ImageView(this).apply { setImageResource(R.drawable.ic_stat_notify); contentDescription = "Dahimail" }, LinearLayout.LayoutParams(dp(24), dp(24)))
        brand.addView(text("Dahimail", 18f).apply { setPadding(dp(10), 0, 0, 0) })
        root.addView(brand)
        val scroll = ScrollView(this).apply { isFillViewport = true }
        val content = LinearLayout(this).apply { orientation = LinearLayout.VERTICAL; gravity = Gravity.CENTER; setPadding(0, dp(20), 0, dp(20)) }
        content.addView(text(label, 16f).apply { setTextColor(Color.rgb(190, 214, 209)) })
        content.addView(text(name, 30f).apply { setPadding(0, dp(18), 0, dp(28)); setTypeface(null, Typeface.BOLD) })
        val avatar = ImageView(this).apply {
            setImageBitmap(NativePushReceiver.avatarPlaceholder(name))
            scaleType = ImageView.ScaleType.CENTER_CROP
            contentDescription = "$name profile picture"
            background = GradientDrawable().apply { shape = GradientDrawable.OVAL; setColor(Color.rgb(47, 85, 78)) }
            clipToOutline = true
        }
        content.addView(avatar, LinearLayout.LayoutParams(dp(144), dp(144)))
        scroll.addView(content)
        root.addView(scroll, LinearLayout.LayoutParams(-1, 0, 1f))
        val actions = LinearLayout(this).apply { gravity = Gravity.CENTER; orientation = LinearLayout.HORIZONTAL }
        fun button(title: String, color: Int, action: () -> Unit): Button = Button(this).apply {
            text = title; isAllCaps = false; textSize = 18f; setTextColor(Color.WHITE)
            background = GradientDrawable().apply { cornerRadius = dp(32).toFloat(); setColor(color) }
            setOnClickListener { if (!responding && NativePushReceiver.callExpiry(this@IncomingCallActivity, callId) > System.currentTimeMillis()) { responding = true; action() } }
        }
        val params = LinearLayout.LayoutParams(0, dp(64), 1f).apply { setMargins(dp(6), 0, dp(6), 0) }
        actions.addView(button("Decline", Color.rgb(200, 45, 58)) {
            NativePushReceiver.declineIntent(this, callData).send()
            finish()
        }, params)
        actions.addView(button("Answer", Color.rgb(25, 151, 88)) {
            NativePushReceiver.dismissCall(this, callId)
            startActivity(NativePushReceiver.answerActivityIntent(this, callId))
            finish()
        }, LinearLayout.LayoutParams(params))
        root.addView(actions, LinearLayout.LayoutParams(-1, -2))
        setContentView(root)
        val avatarUrl = callData["caller_avatar"].orEmpty()
        val shownId = callId
        if (avatarUrl.startsWith("https://")) images.execute {
            val bitmap = NativePushReceiver.fetchAvatar(avatarUrl) ?: return@execute
            runOnUiThread { if (!isFinishing && callId == shownId) avatar.setImageBitmap(bitmap) }
        }
    }

    private fun text(value: String, size: Float) = TextView(this).apply {
        text = value; textSize = size; gravity = Gravity.CENTER; setTextColor(Color.WHITE)
    }
    private fun dp(value: Int) = (value * resources.displayMetrics.density).toInt()
    override fun onDestroy() {
        handler.removeCallbacksAndMessages(null)
        if (registered) unregisterReceiver(closed)
        super.onDestroy()
    }
    companion object { private val images = Executors.newSingleThreadExecutor() }
}
