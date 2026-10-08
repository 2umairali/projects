import 'package:flutter/foundation.dart';
import 'package:flutter_local_notifications/flutter_local_notifications.dart';
import 'package:flutter/services.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:shared_preferences_platform_interface/in_memory_shared_preferences_async.dart';
import 'package:shared_preferences_platform_interface/shared_preferences_async_platform_interface.dart';
import 'package:dahimail/core/notify.dart';

void main() {
  TestWidgetsFlutterBinding.ensureInitialized();
  const channel = MethodChannel('dexterous.com/flutter/local_notifications');
  final shown = <MethodCall>[];
  setUp(() {
    debugDefaultTargetPlatformOverride = TargetPlatform.android;
    AndroidFlutterLocalNotificationsPlugin.registerWith();
    SharedPreferences.setMockInitialValues({});
    SharedPreferencesAsyncPlatform.instance = InMemorySharedPreferencesAsync.empty();
    shown.clear();
    TestDefaultBinaryMessengerBinding.instance.defaultBinaryMessenger.setMockMethodCallHandler(channel, (call) async {
      if (call.method == 'show') shown.add(call);
      if (call.method == 'getNotificationAppLaunchDetails') return {'notificationLaunchedApp': false};
      return true;
    });
  });
  tearDown(() { debugDefaultTargetPlatformOverride = null; });

  test('foreground email and social alerts post visible notifications and deduplicate replay', () async {
    final alert = {'type': 'email_failed', 'title': 'Email could not be sent', 'body': 'Synthetic subject', 'notification_id': 'notice-1'};
    await NotifyService.I.showRemote(alert, messageId: 'fcm-1');
    await NotifyService.I.showRemote(alert, messageId: 'fcm-redelivery');
    await NotifyService.I.showRemote({'type': 'friend_request', 'title': 'Friend request', 'notification_id': 'notice-2'});
    expect(shown.length, 2);
    expect((shown.first.arguments as Map)['title'], 'Email could not be sent');
    expect((shown.first.arguments as Map)['id'], isNot((shown.last.arguments as Map)['id']));
  });

  test('native call events are not duplicated as ordinary alerts', () async {
    await NotifyService.I.showRemote({'type': 'call', 'title': 'Incoming call'});
    await NotifyService.I.showRemote({'type': 'call_cancel', 'title': 'Cancelled'});
    expect(shown, isEmpty);
  });

  test('disabled notification categories suppress local push alerts', () async {
    SharedPreferences.setMockInitialValues({'n_messages': false});
    await NotifyService.I.showRemote({'type': 'email_received', 'title': 'New email'});
    expect(shown, isEmpty);
  });
}
