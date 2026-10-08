import 'dart:io' show Platform;
import 'package:flutter/material.dart';
import 'package:permission_handler/permission_handler.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'config.dart';
import 'device_env.dart';
import 'native_calls.dart';
import 'nav.dart';
import 'notify.dart';
import 'theme.dart';

/// Permissions are asked IN CONTEXT – never in a row on first launch:
///  • notifications (+ calls on the lock screen) : once, right after the first sign-in, with a plain explanation;
///  • microphone / camera                       : the first time a call, voice message or photo needs them;
///  • contacts                                  : when the person taps "Find friends from my contacts";
///  • floating call window (over other apps)    : the first time a call is minimised;
///  • battery "keep running" page               : offered once, after the first call, on phones that stop background apps.
/// Every explanation is shown ONCE per permission; afterwards only the phone's own dialog (or the Settings shortcut) appears.
class AppPermissions {
  static Future<bool> _seen(String k) async => (await SharedPreferences.getInstance()).getBool('perm_explained_$k') == true;
  static Future<void> _mark(String k) async => (await SharedPreferences.getInstance()).setBool('perm_explained_$k', true);

  /// A friendly explanation first. Returns true when the person wants to continue.
  static Future<bool> explain(BuildContext? ctx, {required IconData icon, required String title, required String why, String yes = 'Continue', String no = 'Not now'}) async {
    final c = ctx ?? rootNavKey.currentContext;
    if (c == null || !c.mounted) return true; // no screen to ask on (background work): let the system dialog decide
    final r = await showDialog<bool>(
      context: c,
      builder: (d) => AlertDialog(
        icon: Icon(icon, size: 32, color: AppColors.primary),
        title: Text(title),
        content: Text(why),
        actions: [
          TextButton(onPressed: () => Navigator.pop(d, false), child: Text(no)),
          FilledButton(style: FilledButton.styleFrom(minimumSize: const Size(96, 44)), onPressed: () => Navigator.pop(d, true), child: Text(yes)),
        ],
      ),
    );
    return r == true;
  }

  /// Ask for [p] at the moment a feature needs it. [why] is shown once, before the phone's dialog.
  /// If the person blocked it for good, a short dialog offers the Settings page instead of silently failing.
  static Future<bool> ask(Permission p, {required String key, required IconData icon, required String title, required String why, String blocked = 'It is turned off for this app. You can allow it in the phone settings.', BuildContext? context}) async {
    try {
      var s = await p.status;
      if (s.isGranted || s.isLimited) return true;
      if (s.isPermanentlyDenied || (Platform.isIOS && s.isDenied && await _seen(key))) {
        final c = context ?? rootNavKey.currentContext;
        if (c != null && c.mounted) {
          final go = await explain(c, icon: icon, title: title, why: blocked, yes: 'Open settings');
          if (go) await openAppSettings();
        }
        return false;
      }
      if (!await _seen(key)) {
        await _mark(key);
        if (!await explain(context, icon: icon, title: title, why: why)) return false;
      }
      s = await p.request();
      return s.isGranted || s.isLimited;
    } catch (_) {
      return false;
    }
  }

  static Future<bool> microphone({BuildContext? context}) => ask(Permission.microphone, key: 'mic', icon: Icons.mic_rounded, title: 'Allow the microphone', why: 'Needed so the other person can hear you in calls and voice messages. It is only used while a call or recording is running.', context: context);
  static Future<bool> camera({BuildContext? context}) => ask(Permission.camera, key: 'cam', icon: Icons.videocam_rounded, title: 'Allow the camera', why: 'Needed for video calls and to take photos. It is only used when you switch the camera on or take a picture.', context: context);
  static Future<bool> contacts({BuildContext? context}) => ask(Permission.contacts, key: 'contacts', icon: Icons.contacts_rounded, title: 'Find friends in your contacts', why: 'Phone numbers in your contacts are compared with ${AppConfig.appName} members to suggest friends. Names are never read or sent, and nothing is stored.', context: context);

  // ───────────── right after the first sign-in ─────────────

  /// Calls this once after sign-in. Safe to call on every start: it only does something the first time.
  static Future<void> setupAfterSignIn(BuildContext context) async {
    final p = await SharedPreferences.getInstance();
    if (p.getBool('perm_setup_v3') == true) {
      // Existing installs may predate the Android 14 full-screen permission request.
      if (await NotifyService.I.allowed() && context.mounted) await _lockScreenCalls(context);
      return;
    }
    if (await NotifyService.I.allowed()) {
      await p.setBool('perm_setup_v3', true);
      await _lockScreenCalls(context);
      return;
    }
    if (!context.mounted) return;
    final yes = await explain(
      context,
      icon: Icons.notifications_active_outlined,
      title: 'Never miss a call or message',
      why: 'Turn on notifications to see calls ringing, new messages and friend requests – even when ${AppConfig.appName} is closed or you are using another app.',
      yes: 'Turn on',
    );
    await p.setBool('perm_setup_v3', true);
    if (yes) {
      await NotifyService.I.requestPermission();
      if (context.mounted) await _lockScreenCalls(context);
    }
  }

  /// Android 14+: calls can only fill the lock screen when the person allows "full-screen notifications".
  static Future<void> _lockScreenCalls(BuildContext context) async {
    if (!Platform.isAndroid) return;
    try {
      if (await DeviceEnv.canFullScreenIntent() || await _seen('full_screen_calls')) return;
      if (!context.mounted) return;
      await _mark('full_screen_calls');
      final yes = await explain(context, icon: Icons.phone_in_talk_rounded, title: 'Show calls on the lock screen', why: 'So an incoming call opens full screen like a normal phone call, also when the phone is locked. The next screen is a phone setting – switch it on for this app.', yes: 'Open setting');
      if (yes) await DeviceEnv.openFullScreenIntentSettings();
    } catch (_) {}
  }

  // ───────────── floating call window ─────────────

  /// Called when a call is minimised. Returns true when the floating window can be used.
  static Future<bool> floatingWindow() async {
    if (!Platform.isAndroid) return false;
    if (await NativeCalls.canDraw()) return true;
    if (await _seen('overlay')) return false; // asked before: do not nag; Settings → Permissions lets them change it
    await _mark('overlay');
    final yes = await explain(null, icon: Icons.picture_in_picture_alt_rounded, title: 'Keep the call on screen', why: 'Allow "Display over other apps" to see a small call window with Mute and End buttons while you use another app. You can return to the call with one tap.', yes: 'Allow');
    if (yes) await NativeCalls.requestDraw();
    return false;
  }

  // ───────────── battery (phones that stop background apps) ─────────────

  /// Offered once, after the first call. Many phones (Xiaomi, Oppo, Vivo, Huawei, Samsung…) stop apps in the background and then
  /// calls / messages arrive late. This opens the phone's own battery page; the person chooses "Unrestricted" for this app.
  static Future<void> offerBatteryHelp() async {
    if (!Platform.isAndroid || await _seen('battery')) return;
    await _mark('battery');
    final yes = await explain(null, icon: Icons.battery_charging_full_rounded, title: 'Get calls on time', why: 'Some phones stop apps in the background to save battery, which delays calls and messages. Open the battery page and set this app to "Unrestricted" (or turn off battery optimisation). On Xiaomi / Oppo / Vivo also allow "Autostart".', yes: 'Open battery page', no: 'Later');
    if (yes) await NativeCalls.openBatterySettings();
  }

  // ───────────── helpers used by other screens ─────────────

  static Future<bool> ensureNotifications() => NotifyService.I.requestPermission();

  /// Opens the phone's notification settings for this app.
  static Future<void> openNotificationSettings() async {
    if (!await DeviceEnv.openNotificationSettings()) await openAppSettings();
  }
}
