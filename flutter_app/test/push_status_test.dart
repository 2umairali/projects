import 'package:flutter_test/flutter_test.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:shared_preferences_platform_interface/in_memory_shared_preferences_async.dart';
import 'package:shared_preferences_platform_interface/shared_preferences_async_platform_interface.dart';
import 'package:dahimail/core/push_status.dart';
import 'package:dahimail/core/push_receipt.dart';

void main() {
  TestWidgetsFlutterBinding.ensureInitialized();
  test('saving a token on an unconfigured or mismatched server never claims background registration readiness', () {
    for (final code in ['server_unconfigured', 'project_mismatch']) {
      final state = PushConnectionStatus.fromRegistration({'message': 'Device registered.', 'push_configured': false, 'push_status': code});
      expect(state.registered, false);
      expect(state.code, code);
      expect(state.message, isNot(contains('Firebase accepted')));
    }
    final registered = PushConnectionStatus.fromRegistration({'push_configured': true, 'push_status': 'registered', 'registration_needs_migration': true, 'voip_configured': false});
    expect(registered.needsMigration, true);
    expect(registered.voipConfigured, false);
    expect(registered.message, contains('try a real call'));
  });

  test('remote receipt evidence is readable from a fresh preferences client without a cached isolate view', () async {
    SharedPreferencesAsyncPlatform.instance = InMemorySharedPreferencesAsync.empty();
    expect(await PushReceipt.lastReceived(), isNull);
    await PushReceipt.received();
    final stored = await SharedPreferencesAsync().getString('last_remote_push_at');
    expect(DateTime.tryParse(stored!), isNotNull);
    expect(await PushReceipt.lastReceived(), stored);
  });
}
