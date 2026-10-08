package com.dahify.dahimail

import android.app.PictureInPictureParams
import android.content.Intent
import android.content.res.Configuration
import android.net.Uri
import android.util.Rational
import android.os.Build
import android.os.Bundle
import android.provider.Settings
import java.util.TimeZone
import io.flutter.plugin.common.MethodChannel
import android.os.Handler
import android.os.Looper
import androidx.core.splashscreen.SplashScreen.Companion.installSplashScreen
import io.flutter.embedding.android.FlutterFragmentActivity
import io.flutter.embedding.engine.FlutterEngine
import io.flutter.embedding.engine.renderer.FlutterUiDisplayListener

// FlutterFragmentActivity (not FlutterActivity) is required by the fingerprint / face prompt (local_auth).
class MainActivity : FlutterFragmentActivity() {
    @Volatile private var uiReady = false
    private var callChannel: MethodChannel? = null
    /** Dart sets this while a VIDEO call is running: pressing Home then shrinks the call into Picture-in-Picture (like WhatsApp). */
    private var pipArmed = false

    override fun onUserLeaveHint() {
        super.onUserLeaveHint()
        if (pipArmed && Build.VERSION.SDK_INT >= 26) {
            try { enterPictureInPictureMode(PictureInPictureParams.Builder().setAspectRatio(Rational(9, 16)).build()) } catch (_: Exception) {}
        }
    }

    override fun onPictureInPictureModeChanged(isInPictureInPictureMode: Boolean, newConfig: Configuration) {
        super.onPictureInPictureModeChanged(isInPictureInPictureMode, newConfig)
        callChannel?.invokeMethod("pip", isInPictureInPictureMode)
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        val splash = installSplashScreen()
        super.onCreate(savedInstanceState)
        // ONE splash: keep it until Flutter has drawn its first real screen (the app holds that frame back until it is ready).
        splash.setKeepOnScreenCondition { !uiReady }
        showOverLockscreenForCall(intent)
        // Safety net: never keep the splash longer than 4 seconds, whatever happens.
        Handler(Looper.getMainLooper()).postDelayed({ uiReady = true }, 4000)
    }

    // A call notification (full-screen intent) opens the app on top of the lock screen, like a normal phone call.
    private fun showOverLockscreenForCall(i: Intent?) {
        if (i?.action == "SELECT_NOTIFICATION" && Build.VERSION.SDK_INT >= 27) {
            setShowWhenLocked(true)
            setTurnScreenOn(true)
        }
    }

    override fun onNewIntent(intent: Intent) {
        super.onNewIntent(intent)
        showOverLockscreenForCall(intent)
    }

    override fun configureFlutterEngine(flutterEngine: FlutterEngine) {
        super.configureFlutterEngine(flutterEngine)
        // Facts read straight from the phone (used by lib/core/device_env.dart)
        MethodChannel(flutterEngine.dartExecutor.binaryMessenger, "com.dahify.dahimail/device").setMethodCallHandler { call, result ->
            when (call.method) {
                "timezone" -> result.success(TimeZone.getDefault().id)
                "canFullScreenIntent" -> {
                    val nm = getSystemService(android.app.NotificationManager::class.java)
                    result.success(if (Build.VERSION.SDK_INT >= 34) nm.canUseFullScreenIntent() else true)
                }
                "openFullScreenIntentSettings" -> {
                    try {
                        if (Build.VERSION.SDK_INT >= 34) {
                            val i = Intent(Settings.ACTION_MANAGE_APP_USE_FULL_SCREEN_INTENT, android.net.Uri.parse("package:" + packageName))
                            i.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK)
                            startActivity(i)
                        }
                        result.success(true)
                    } catch (e: Exception) { result.success(false) }
                }
                "openNotificationSettings" -> {
                    try {
                        val i = Intent(Settings.ACTION_APP_NOTIFICATION_SETTINGS).putExtra(Settings.EXTRA_APP_PACKAGE, packageName)
                        i.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK)
                        startActivity(i)
                        result.success(true)
                    } catch (e: Exception) { result.success(false) }
                }
                else -> result.notImplemented()
            }
        }
        // Floating call window, Picture-in-Picture and battery settings (lib/core/native_calls.dart)
        callChannel = MethodChannel(flutterEngine.dartExecutor.binaryMessenger, "com.dahify.dahimail/call").also { ch ->
            CallOverlayService.listener = { action -> runOnUiThread { ch.invokeMethod("overlayAction", action) } }
            ch.setMethodCallHandler { call, result ->
                when (call.method) {
                    "overlayCanDraw" -> result.success(CallOverlayService.canDraw(this))
                    "overlayRequest" -> {
                        try {
                            val i = Intent(Settings.ACTION_MANAGE_OVERLAY_PERMISSION, Uri.parse("package:" + packageName))
                            i.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK); startActivity(i); result.success(true)
                        } catch (e: Exception) { result.success(false) }
                    }
                    "overlayShow" -> {
                        CallOverlayService.show(this, call.argument<String>("title") ?: "Call", (call.argument<Number>("since")?.toLong() ?: 0L), call.argument<Boolean>("muted") ?: false)
                        result.success(true)
                    }
                    "overlayUpdate" -> {
                        CallOverlayService.update(call.argument<String>("title") ?: "Call", (call.argument<Number>("since")?.toLong() ?: 0L), call.argument<Boolean>("muted") ?: false)
                        result.success(true)
                    }
                    "overlayHide" -> { CallOverlayService.hide(this); result.success(true) }
                    "pipArm" -> { pipArmed = call.argument<Boolean>("on") ?: false; result.success(true) }
                    "openBatterySettings" -> {
                        try {
                            val i = Intent(Settings.ACTION_IGNORE_BATTERY_OPTIMIZATION_SETTINGS)
                            i.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK); startActivity(i); result.success(true)
                        } catch (e: Exception) { result.success(false) }
                    }
                    else -> result.notImplemented()
                }
            }
        }
        flutterEngine.renderer.addIsDisplayingFlutterUiListener(object : FlutterUiDisplayListener {
            override fun onFlutterUiDisplayed() { uiReady = true }
            override fun onFlutterUiNoLongerDisplayed() {}
        })
    }
}
