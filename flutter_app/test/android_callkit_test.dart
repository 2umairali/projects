import 'package:flutter/services.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:shared_preferences_platform_interface/in_memory_shared_preferences_async.dart';
import 'package:shared_preferences_platform_interface/shared_preferences_async_platform_interface.dart';
import 'package:dahimail/core/notify.dart';
import 'package:dahimail/core/android_callkit.dart';

void main() {
  TestWidgetsFlutterBinding.ensureInitialized();
  const channel = MethodChannel('flutter_callkit_incoming');
  final calls = <MethodCall>[];
  setUp(() {
    calls.clear();
    SharedPreferencesAsyncPlatform.instance = InMemorySharedPreferencesAsync.empty();
    AndroidCallKit.ringing.clear();
    TestDefaultBinaryMessengerBinding.instance.defaultBinaryMessenger.setMockMethodCallHandler(channel, (call) async {
      calls.add(call);
      if (call.method == 'activeCalls') {
        final shown = calls.where((c) => c.method == 'showCallkitIncoming');
        return [if (shown.isNotEmpty) shown.last.arguments];
      }
      return null;
    });
  });
  tearDown(() => TestDefaultBinaryMessengerBinding.instance.defaultBinaryMessenger.setMockMethodCallHandler(channel, null));

  test('expired native calls do not ring', () async {
    await AndroidCallKit.show({'uuid': 'test', 'call_id': '5', 'ttl': '45', 'sent_at': '${DateTime.now().millisecondsSinceEpoch ~/ 1000 - 60}'});
    expect(calls, isEmpty);
  });

  test('native call UI receives stable identity, remaining TTL and original call metadata', () async {
    await AndroidCallKit.show({'uuid': '00112233-4455-4677-8899-aabbccddeeff', 'call_id': '5', 'caller_name': 'Synthetic caller', 'caller_avatar': 'https://example.test/avatar.jpg', 'video': '1', 'audio_only': '1', 'ttl': '45', 'sent_at': '${DateTime.now().millisecondsSinceEpoch ~/ 1000 - 10}'});
    final call = calls.singleWhere((c) => c.method == 'showCallkitIncoming');
    final args = call.arguments as Map;
    expect(args['id'], '00112233-4455-4677-8899-aabbccddeeff');
    expect((args['extra'] as Map)['call_id'], '5');
    expect(args['type'], 0);
    expect(args['avatar'], 'https://example.test/avatar.jpg');
    expect(args['handle'], 'Incoming Audio Call…');
    expect((args['android'] as Map)['isShowCallID'], true);
    expect(args['duration'] as int, inInclusiveRange(33000, 35000));
    expect((args['missedCallNotification'] as Map)['showNotification'], false);
    expect(calls.first.method, 'registerBackgroundHandler');
  });
  test('native receiver failure is observable so the background handler can fall back', () async {
    TestDefaultBinaryMessengerBinding.instance.defaultBinaryMessenger.setMockMethodCallHandler(channel, (call) async {
      if (call.method == 'activeCalls') { return []; }
      return null; // Plugin acknowledges its broadcast even when the receiver fails.
    });
    await expectLater(AndroidCallKit.show({'uuid': '00112233-4455-4677-8899-aabbccddeeff', 'call_id': '5'}), throwsStateError);
  });

  test('meeting invitations and boolean video flags reach the native call UI', () async {
    await AndroidCallKit.show({'uuid': '00112233-4455-4677-8899-aabbccddeeff', 'call_id': '8', 'group': true, 'video': true, 'meeting': 'synthetic-room'});
    final args = calls.singleWhere((c) => c.method == 'showCallkitIncoming').arguments as Map;
    expect(args['handle'], 'Incoming Meeting…');
    expect(args['type'], 1);
  });

  test('cold-start recovery restores ringing and accepted typed native calls', () async {
    TestDefaultBinaryMessengerBinding.instance.defaultBinaryMessenger.setMockMethodCallHandler(channel, (call) async {
      if (call.method == 'activeCalls') { return [
        {'id': 'ringing-uuid', 'isAccepted': false, 'extra': {'call_id': '7'}},
        {'id': 'accepted-uuid', 'isAccepted': true, 'extra': {'call_id': '8'}},
      ]; }
      return null;
    });
    await AndroidCallKit.restoreActiveCalls();
    expect(AndroidCallKit.ringing[7], 'ringing-uuid');
    expect(NotifyService.I.pendingCallId, 8);
    expect(NotifyService.I.pendingCallAction, 'call_accept');
  });

}
