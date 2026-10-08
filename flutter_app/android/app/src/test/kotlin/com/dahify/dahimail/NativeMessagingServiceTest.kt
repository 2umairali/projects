package com.dahify.dahimail

import android.app.Application
import android.app.KeyguardManager
import android.app.NotificationManager
import android.app.NotificationChannel
import android.os.PowerManager
import org.robolectric.shadows.ShadowSettings
import android.content.Context
import android.content.ContextWrapper
import android.content.Intent
import android.os.Bundle
import com.google.firebase.messaging.RemoteMessage
import org.junit.Assert.*
import org.junit.Before
import org.junit.Test
import org.junit.runner.RunWith
import org.robolectric.Robolectric
import org.robolectric.RobolectricTestRunner
import org.robolectric.RuntimeEnvironment
import org.robolectric.Shadows.shadowOf
import org.robolectric.annotation.Config

/** Exercises the actual FCM callback; Flutter handoff is the only stub. */
class RecordingMessagingService : NativeMessagingService() {
    val forwarded = mutableListOf<Intent>()
    var postedBeforeFlutter = false
    var failFlutter = false
    override fun receiver() = object : NativePushReceiver() {
        override fun forwardToFlutter(context: Context, intent: Intent) {
            postedBeforeFlutter = context.getSystemService(NotificationManager::class.java).activeNotifications.isNotEmpty()
            forwarded.add(Intent(intent))
            if (failFlutter) throw IllegalStateException("Synthetic unavailable Flutter engine")
        }
    }
}

@RunWith(RobolectricTestRunner::class)
@Config(sdk = [33], application = Application::class)
class NativeMessagingServiceTest {
    private lateinit var context: Context
    private lateinit var manager: NotificationManager
    private fun incoming(sent: Long = System.currentTimeMillis() / 1000): RemoteMessage = RemoteMessage(Bundle().apply {
        putString("google.message_id", "synthetic-call-42")
        putString("google.delivered_priority", "high")
        putString("google.original_priority", "high")
        putString("type", "call")
        putString("call_id", "42")
        putString("caller_name", "Alice Example")
        putString("recipient_user_id", "1")
        putString("sent_at", "$sent")
        putString("ttl", "45")
    })

    @Before fun setup() {
        context = RuntimeEnvironment.getApplication()
        manager = context.getSystemService(NotificationManager::class.java)
        manager.cancelAll()
        context.getSharedPreferences("native_push", Context.MODE_PRIVATE).edit().clear().commit()
        MainActivity.isResumed = false
        ShadowSettings.setCanDrawOverlays(false)
        shadowOf(context.getSystemService(KeyguardManager::class.java)).setKeyguardLocked(false)
        shadowOf(context.getSystemService(PowerManager::class.java)).setIsInteractive(true)
        manager.setInterruptionFilter(NotificationManager.INTERRUPTION_FILTER_ALL)
    }

    @Test @Config(sdk = [28, 33, 35]) fun coldCallOpensOverAnotherAppOnlyWithOverlayPermission() {
        ShadowSettings.setCanDrawOverlays(true)
        val service = Robolectric.buildService(RecordingMessagingService::class.java).create()
        service.get().onMessageReceived(incoming())
        val launch = shadowOf(context as Application).nextStartedActivity
        assertEquals(IncomingCallActivity::class.java.name, launch?.component?.className)
        assertTrue(launch!!.getStringExtra("call_data")!!.contains("Alice Example"))
        assertEquals(1, manager.activeNotifications.size)
        // Neither FCM redelivery nor Flutter's fallback may open a second screen.
        service.get().onMessageReceived(incoming())
        assertNull(shadowOf(context as Application).nextStartedActivity)
        service.destroy()
    }

    @Test fun deniedActivityLaunchKeepsNativeNotificationAvailable() {
        ShadowSettings.setCanDrawOverlays(true)
        var attempted = false
        val restricted = object : ContextWrapper(context) {
            override fun startActivity(intent: Intent) {
                attempted = true
                throw SecurityException("Synthetic OEM background launch restriction")
            }
        }
        assertTrue(NativePushReceiver.showCall(restricted, incoming().data))
        assertTrue(attempted)
        assertEquals(1, manager.activeNotifications.size)
        assertNotNull(manager.activeNotifications.single().notification.fullScreenIntent)
    }

    @Test fun overlayGrantCannotBypassDisabledNotifications() {
        ShadowSettings.setCanDrawOverlays(true)
        shadowOf(manager).setNotificationsEnabled(false)
        val service = Robolectric.buildService(RecordingMessagingService::class.java).create()
        service.get().onMessageReceived(incoming())
        assertNull(shadowOf(context as Application).nextStartedActivity)
        assertEquals(0, manager.activeNotifications.size)
        service.destroy()
    }

    @Test fun withoutOverlayPermissionCallKeepsActionableNotification() {
        val service = Robolectric.buildService(RecordingMessagingService::class.java).create()
        service.get().onMessageReceived(incoming())
        assertNull(shadowOf(context as Application).nextStartedActivity)
        val notification = manager.activeNotifications.single().notification
        assertNotNull(notification.fullScreenIntent)
        assertEquals(2, notification.actions.size)
        service.destroy()
    }

    @Test fun overlayPermissionDoesNotBypassLockScreenOrSleepingPhone() {
        ShadowSettings.setCanDrawOverlays(true)
        shadowOf(context.getSystemService(KeyguardManager::class.java)).setKeyguardLocked(true)
        val service = Robolectric.buildService(RecordingMessagingService::class.java).create()
        service.get().onMessageReceived(incoming())
        assertNull(shadowOf(context as Application).nextStartedActivity)
        assertNotNull(manager.activeNotifications.single().notification.fullScreenIntent)
        manager.cancelAll()
        shadowOf(context.getSystemService(KeyguardManager::class.java)).setKeyguardLocked(false)
        shadowOf(context.getSystemService(PowerManager::class.java)).setIsInteractive(false)
        service.get().onMessageReceived(incoming())
        assertNull(shadowOf(context as Application).nextStartedActivity)
        assertNotNull(manager.activeNotifications.single().notification.fullScreenIntent)
        service.destroy()
    }

    @Test fun overlayPermissionDoesNotBypassDndOrSilentCallChannel() {
        ShadowSettings.setCanDrawOverlays(true)
        manager.setInterruptionFilter(NotificationManager.INTERRUPTION_FILTER_NONE)
        val service = Robolectric.buildService(RecordingMessagingService::class.java).create()
        service.get().onMessageReceived(incoming())
        assertNull(shadowOf(context as Application).nextStartedActivity)
        manager.cancelAll()
        manager.setInterruptionFilter(NotificationManager.INTERRUPTION_FILTER_ALL)
        manager.createNotificationChannel(NotificationChannel("dm_calls_v3", "Calls", NotificationManager.IMPORTANCE_LOW))
        service.get().onMessageReceived(incoming())
        assertNull(shadowOf(context as Application).nextStartedActivity)
        assertEquals(1, manager.activeNotifications.size)
        service.destroy()
    }

    @Test fun overlayPermissionCannotLaunchExpiredCancelledOrForegroundCalls() {
        ShadowSettings.setCanDrawOverlays(true)
        val service = Robolectric.buildService(RecordingMessagingService::class.java).create()
        service.get().onMessageReceived(incoming(System.currentTimeMillis() / 1000 - 60))
        assertNull(shadowOf(context as Application).nextStartedActivity)
        NativePushReceiver.dismissCall(context, 42)
        service.get().onMessageReceived(incoming())
        assertNull(shadowOf(context as Application).nextStartedActivity)
        MainActivity.isResumed = true
        service.get().onMessageReceived(incoming())
        assertNull(shadowOf(context as Application).nextStartedActivity)
        assertEquals(0, manager.activeNotifications.size)
        service.destroy()
    }

    @Test fun firebaseResolvesTheNativeServiceInsteadOfTheNoOpFlutterService() {
        val resolved = context.packageManager.resolveService(Intent("com.google.firebase.MESSAGING_EVENT").setPackage(context.packageName), 0)
        assertEquals(NativeMessagingService::class.java.name, resolved?.serviceInfo?.name)
    }

    @Test fun coldServicePostsCallBeforeFlutterAndKeepsItAfterServiceStops() {
        val service = Robolectric.buildService(RecordingMessagingService::class.java).create()
        service.get().onMessageReceived(incoming())
        assertTrue(service.get().postedBeforeFlutter)
        assertEquals("1", RemoteMessage(service.get().forwarded.single().extras!!).data["dm_native_shown"])
        val call = manager.activeNotifications.single().notification
        assertNotNull(call.fullScreenIntent)
        assertEquals(IncomingCallActivity::class.java.name, shadowOf(call.fullScreenIntent).savedIntent.component?.className)
        service.destroy()
        assertEquals(1, manager.activeNotifications.size)
    }

    @Test fun lockedPhoneGetsNativeCallEvenIfActivityWasPreviouslyResumed() {
        MainActivity.isResumed = true
        shadowOf(context.getSystemService(KeyguardManager::class.java)).setKeyguardLocked(true)
        val service = Robolectric.buildService(RecordingMessagingService::class.java).create()
        service.get().onMessageReceived(incoming())
        assertEquals(1, manager.activeNotifications.size)
        service.destroy()
    }

    @Test fun foregroundCallIsForwardedWithoutADuplicateSystemScreen() {
        MainActivity.isResumed = true
        val service = Robolectric.buildService(RecordingMessagingService::class.java).create()
        service.get().onMessageReceived(incoming())
        assertEquals(0, manager.activeNotifications.size)
        assertEquals(1, service.get().forwarded.size)
        assertNull(service.get().forwarded.single().getStringExtra("dm_native_shown"))
        service.destroy()
    }

    @Test fun failedFlutterStartupDoesNotLoseTheBackgroundCall() {
        val service = Robolectric.buildService(RecordingMessagingService::class.java).create()
        service.get().failFlutter = true
        service.get().onMessageReceived(incoming())
        assertEquals(1, manager.activeNotifications.size)
        service.destroy()
    }

    @Test fun cancelPreventsDelayedInviteFromRingingAgain() {
        val service = Robolectric.buildService(RecordingMessagingService::class.java).create()
        service.get().onMessageReceived(incoming())
        service.get().onMessageReceived(RemoteMessage(Bundle().apply { putString("type", "call_cancel"); putString("call_id", "42") }))
        assertEquals(0, manager.activeNotifications.size)
        service.get().onMessageReceived(incoming())
        assertEquals(0, manager.activeNotifications.size)
        service.destroy()
    }

    @Test fun dataBroadcastIsIgnoredButLegacyNotificationBookkeepingIsPreserved() {
        val forwarded = mutableListOf<Intent>()
        val receiver = object : NativePushReceiver() {
            override fun forwardToFlutter(context: Context, intent: Intent) { forwarded.add(intent) }
        }
        receiver.onReceive(context, incoming().toIntent())
        assertEquals(0, forwarded.size)
        assertEquals(0, manager.activeNotifications.size)
        receiver.onReceive(context, Intent().putExtra("gcm.n.e", "1").putExtra("gcm.n.title", "Legacy notification"))
        assertEquals(1, forwarded.size)
    }

    @Test fun redeliveryDoesNotExtendRingingAndExpiredCallsStaySilent() {
        val service = Robolectric.buildService(RecordingMessagingService::class.java).create()
        val first = incoming(System.currentTimeMillis() / 1000 - 5)
        service.get().onMessageReceived(first)
        val expires = NativePushReceiver.callExpiry(context, 42)
        service.get().onMessageReceived(incoming())
        assertEquals(expires, NativePushReceiver.callExpiry(context, 42))
        assertEquals(1, manager.activeNotifications.size)
        NativePushReceiver.dismissCall(context, 42)
        service.get().onMessageReceived(incoming(System.currentTimeMillis() / 1000 - 60))
        assertEquals(0, manager.activeNotifications.size)
        service.destroy()
    }

    @Test fun dataOnlyMessageBannerAlsoSurvivesColdServiceDelivery() {
        val service = Robolectric.buildService(RecordingMessagingService::class.java).create()
        service.get().onMessageReceived(RemoteMessage(Bundle().apply {
            putString("type", "chat"); putString("notification_layout", "v2"); putString("notification_id", "msg-1")
            putString("title", "Alice Example"); putString("body", "Hello"); putString("category_label", "Chat")
        }))
        assertEquals(1, manager.activeNotifications.size)
        assertTrue(service.get().postedBeforeFlutter)
        service.destroy()
    }
}
