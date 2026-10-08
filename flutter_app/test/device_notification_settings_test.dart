import 'package:flutter/material.dart';
import 'package:flutter/foundation.dart';
import 'package:flutter/services.dart';
import 'package:flutter_local_notifications/flutter_local_notifications.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences_platform_interface/in_memory_shared_preferences_async.dart';
import 'package:shared_preferences_platform_interface/shared_preferences_async_platform_interface.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:dahimail/core/prefs.dart';
import 'package:dahimail/core/notification_presentation.dart';
import 'package:dahimail/screens/app_settings_screens.dart';

void main() {
  test('saved notification preferences survive repeated loads', () async {
    SharedPreferences.setMockInitialValues({
      'n_enabled': false, 'n_messages': false, 'n_sound_id': 'silent', 'q_enabled': true,
      'theme': 'dark', 'n_shown': ['existing'],
    });
    final prefs = AppPrefs();
    await prefs.load();
    expect(prefs.notifEnabled, isFalse);
    expect(prefs.notifMessages, isFalse);
    expect(prefs.soundId, 'silent');
    expect(prefs.quietEnabled, isTrue);
    expect(prefs.themeMode, ThemeMode.dark);
    expect(prefs.shownIds, ['existing']);
    await prefs.setFlag('n_billing', false);
    await prefs.setFlag('n_vibrate', false);
    await prefs.setQuiet(start: 1260, end: 360);
    final reloaded = AppPrefs();
    await reloaded.load();
    expect(reloaded.notifEnabled, isFalse);
    expect(reloaded.notifMessages, isFalse);
    expect(reloaded.notifBilling, isFalse);
    expect(reloaded.notifVibrate, isFalse);
    expect(reloaded.soundId, 'silent');
    expect(reloaded.quietEnabled, isTrue);
    expect(reloaded.quietStart, 1260);
    expect(reloaded.quietEnd, 360);
    reloaded.dispose();
    prefs.dispose();
  });

  test('system headings and friend action content keep names separate', () {
    expect(NotificationPresentation.systemLabel({'type': 'email_received'}), 'New email');
    expect(NotificationPresentation.systemLabel({'type': 'chat'}), 'Chat');
    expect(NotificationPresentation.systemLabel({'type': 'friend_request'}), 'Friend request');
    expect(NotificationPresentation.systemBody({'type': 'friend_request'}, 'Open Friends'), 'Sent you a friend request');
    expect(NotificationPresentation.systemBody({'type': 'friend_accepted'}, 'Open Friends'), 'Accepted your friend request');
    expect(NotificationPresentation.systemBody({'type': 'chat'}, 'Hello Alice'), 'Hello Alice');
  });

  testWidgets('full device controls are reachable and save preferences', (tester) async {
    debugDefaultTargetPlatformOverride = TargetPlatform.android;
    addTearDown(() => debugDefaultTargetPlatformOverride = null);
    AndroidFlutterLocalNotificationsPlugin.registerWith();
    SharedPreferences.setMockInitialValues({});
    SharedPreferencesAsyncPlatform.instance = InMemorySharedPreferencesAsync.empty();
    final shown = <MethodCall>[];
    final messenger = TestDefaultBinaryMessengerBinding.instance.defaultBinaryMessenger;
    messenger.setMockMethodCallHandler(const MethodChannel('dexterous.com/flutter/local_notifications'), (call) async {
      if (call.method == 'show') shown.add(call);
      if (call.method == 'getNotificationAppLaunchDetails') return {'notificationLaunchedApp': false};
      return true;
    });
    messenger.setMockMethodCallHandler(const MethodChannel('com.dahify.dahimail/device'), (call) async {
      if (call.method == 'notificationDiagnostics') return {'enabled': true};
      if (call.method == 'lastNativePushAt') return 0;
      return true;
    });
    addTearDown(() {
      messenger.setMockMethodCallHandler(const MethodChannel('dexterous.com/flutter/local_notifications'), null);
      messenger.setMockMethodCallHandler(const MethodChannel('com.dahify.dahimail/device'), null);
    });
    final prefs = AppPrefs();
    await prefs.load();
    await tester.pumpWidget(ChangeNotifierProvider<AppPrefs>.value(
      value: prefs,
      child: const MaterialApp(home: Scaffold(body: DeviceNotificationsPage())),
    ));
    await tester.pumpAndSettle();
    expect(find.text('Check connection'), findsOneWidget);
    final settingsScroll = find.descendant(of: find.byType(ListView), matching: find.byType(Scrollable)).first;
    await tester.scrollUntilVisible(find.text('Background battery settings'), 180, scrollable: settingsScroll);
    await tester.pumpAndSettle();
    expect(find.text('Background battery settings'), findsOneWidget);
    await tester.scrollUntilVisible(find.text('New messages'), 180, scrollable: settingsScroll);
    await tester.pumpAndSettle();
    await tester.tap(find.text('New messages'));
    await tester.pumpAndSettle();
    expect(prefs.notifMessages, isFalse);
    await tester.scrollUntilVisible(find.text('Notification sound'), 180, scrollable: settingsScroll);
    await tester.pumpAndSettle();
    await tester.tap(find.text('Notification sound'));
    await tester.pumpAndSettle();
    expect(find.descendant(of: find.byType(AlertDialog), matching: find.text('Phone default')), findsOneWidget);
    await tester.ensureVisible(find.text('Silent'));
    await tester.tap(find.text('Silent'));
    await tester.tap(find.text('Save'));
    await tester.pumpAndSettle();
    expect(prefs.soundId, 'silent');
    await tester.scrollUntilVisible(find.text('Do not disturb on a schedule'), 180, scrollable: settingsScroll);
    await tester.pumpAndSettle();
    await tester.tap(find.text('Do not disturb on a schedule'));
    await tester.pumpAndSettle();
    expect(prefs.quietEnabled, isTrue);
    expect(tester.widget<ListTile>(find.ancestor(of: find.text('From'), matching: find.byType(ListTile))).enabled, isTrue);
    await tester.scrollUntilVisible(find.text('Test notification display on this phone'), 180, scrollable: settingsScroll);
    await tester.pumpAndSettle();
    await tester.tap(find.text('Test notification display on this phone'));
    await tester.pumpAndSettle();
    expect(shown, hasLength(1));
    final reloaded = AppPrefs();
    await reloaded.load();
    expect(reloaded.notifMessages, isFalse);
    expect(reloaded.soundId, 'silent');
    expect(reloaded.quietEnabled, isTrue);
    reloaded.dispose();
    await tester.pumpWidget(const SizedBox.shrink());
    prefs.dispose();
    debugDefaultTargetPlatformOverride = null;
  });
}
