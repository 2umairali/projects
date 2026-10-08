import 'package:shared_preferences/shared_preferences.dart';

/// Cross-isolate receipt evidence; stores no sender, message content or device token.
class PushReceipt {
  static final _storage = SharedPreferencesAsync();
  static Future<void> received() async {
    try {
      await _storage.setString('last_remote_push_at', DateTime.now().toUtc().toIso8601String());
    } catch (_) {}
  }
  static Future<String?> lastReceived() async {
    try { return await _storage.getString('last_remote_push_at'); } catch (_) { return null; }
  }
}
