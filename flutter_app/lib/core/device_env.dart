import 'dart:io';
import 'package:flutter/services.dart';

/// Facts read straight from the phone: its IANA timezone (e.g. "Asia/Karachi").
/// The server reads the IP address itself from the request, so nothing else is needed here.
class DeviceEnv {
  static const _ch = MethodChannel('com.dahify.dahimail/device');
  static String? _tz;
  /// Last known timezone, available synchronously (for request headers).
  static String? get cached => _tz;

  /// The phone's current timezone. Re-read every call (the user may travel / change it), cached only as a fallback.
  static Future<String?> timezone() async {
    try {
      if (Platform.isAndroid || Platform.isIOS) {
        final v = await _ch.invokeMethod<String>('timezone');
        if (v != null && v.isNotEmpty) return _tz = v;
      }
    } catch (_) {}
    return _tz;
  }

  /// Opens this app's notification page in the phone's settings (falls back to false if unsupported).
  static Future<bool> openNotificationSettings() async {
    try {
      if (Platform.isAndroid) return (await _ch.invokeMethod<bool>('openNotificationSettings')) ?? false;
    } catch (_) {}
    return false;
  }

  /// Android 14+: may this app show a call on the lock screen? (older Android: always yes)
  static Future<bool> canFullScreenIntent() async {
    try {
      if (Platform.isAndroid) return (await _ch.invokeMethod<bool>('canFullScreenIntent')) ?? true;
    } catch (_) {}
    return true;
  }

  static Future<void> openFullScreenIntentSettings() async {
    try {
      if (Platform.isAndroid) await _ch.invokeMethod('openFullScreenIntentSettings');
    } catch (_) {}
  }
}
