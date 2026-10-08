import 'dart:async';
import 'package:flutter/widgets.dart';
import 'dart:io';
import 'package:firebase_core/firebase_core.dart';
import 'package:firebase_messaging/firebase_messaging.dart';
import 'package:package_info_plus/package_info_plus.dart';
import 'api.dart';
import 'calls.dart';
import 'notify.dart';
import 'refresh.dart';
import 'android_callkit.dart';
import 'push_status.dart';
import 'push_receipt.dart';

/// Runs in its own isolate when a push arrives while the app is closed. Messages that carry a `notification` block are
/// shown by Android itself – nothing else to do here, but Firebase must be initialised.
@pragma('vm:entry-point')
Future<void> firebaseBackgroundHandler(RemoteMessage message) async {
  await Firebase.initializeApp();
  final t = message.data['type'];
  await PushReceipt.received();
  if (Platform.isAndroid && t == 'call') {
    // a call that is already too old (phone was off / no network) must not ring: it would only be a "ghost" call
    final sent = int.tryParse('${message.data['sent_at'] ?? ''}');
    final ttl = int.tryParse('${message.data['ttl'] ?? ''}') ?? 45;
    if (sent != null && DateTime.now().millisecondsSinceEpoch ~/ 1000 - sent > ttl) return;
    try {
      await AndroidCallKit.show(Map<String, dynamic>.from(message.data));
    } catch (_) {
      await NotifyService.showIncomingCall(Map<String, dynamic>.from(message.data));
    }
  }
  if (t != 'call' && t != 'call_cancel' && message.notification == null) {
    await NotifyService.I.showRemote(message.data, messageId: message.messageId);
  }
  if (Platform.isAndroid && t == 'call_cancel') {
    try { await AndroidCallKit.cancel(Map<String, dynamic>.from(message.data)); } catch (_) {}
    await NotifyService.cancelIncomingCall(callId: int.tryParse('${message.data['call_id']}'));
  }
}

/// Firebase Cloud Messaging: delivers notifications even when the app is closed.
/// The phone's FCM token is stored on the server (POST me/devices); the server sends a push whenever it creates a
/// notification for the user.
class PushService with WidgetsBindingObserver {
  PushService._();
  static final PushService I = PushService._();

  String? _token;
  final status = ValueNotifier<PushConnectionStatus>(const PushConnectionStatus('not_checked'));
  bool _listening = false;
  Api? _api;

  Timer? _retry;
  bool _registering = false, _registerAgain = false;

  @override
  void didChangeAppLifecycleState(AppLifecycleState state) {
    if (state == AppLifecycleState.resumed && _api != null) register(_api!);
  }

  void _listen() {
    if (_listening) return;
    _listening = true;
    WidgetsBinding.instance.addObserver(this);
    FirebaseMessaging.onMessage.listen((m) async {
      await PushReceipt.received();
      if (_api == null) return;
      AppRefresh.bump();
      final type = m.data['type'];
      if (type == 'call') {
        if (Platform.isAndroid && NotifyService.I.state != AppLifecycleState.resumed) {
          try { await AndroidCallKit.show(m.data); }
          catch (_) { await NotifyService.showIncomingCall(m.data); }
        }
        CallManager.I.incomingPush(m.data);
      } else if (type == 'call_cancel') {
        if (Platform.isAndroid) {
          try { await AndroidCallKit.cancel(m.data); } catch (_) {}
          await NotifyService.cancelIncomingCall(callId: int.tryParse('${m.data['call_id']}'));
        }
        CallManager.I.pollNow();
      } else {
        if (type == 'chat' || type == 'missed_call') CallManager.I.pollNow();
        try { await NotifyService.I.showRemote({
          ...m.data,
          if (m.data['title'] == null && m.notification?.title != null) 'title': m.notification!.title!,
          if (m.data['body'] == null && m.notification?.body != null) 'body': m.notification!.body!,
        }, messageId: m.messageId, foreground: NotifyService.I.inForeground); } catch (_) {}
      }
    });
    FirebaseMessaging.instance.onTokenRefresh.listen((token) {
      _token = token;
      if (_api != null) register(_api!);
    });
    FirebaseMessaging.onMessageOpenedApp.listen((_) => NotifyService.I.tapped.value++);
    FirebaseMessaging.instance.getInitialMessage().then((first) {
      if (first != null) NotifyService.I.tapped.value++;
    }).catchError((_) {});
  }

  Future<void> register(Api api) async {
    if (!Platform.isIOS && !Platform.isAndroid) return;
    _api = api;
    _listen(); // Receive token refreshes even when the first registration fails.
    if (_registering) { _registerAgain = true; return; }
    _registering = true;
    _retry?.cancel();
    final sessionToken = api.session.token;
    status.value = const PushConnectionStatus('connecting', busy: true);
    var failure = 'firebase_unavailable';
    try {
      final fm = FirebaseMessaging.instance;
      await fm.setForegroundNotificationPresentationOptions(alert: false, badge: true, sound: false);
      if (Platform.isIOS && await fm.getAPNSToken() == null) {
        failure = 'apns_pending';
        throw StateError('Waiting for APNs registration');
      }
      final token = await fm.getToken();
      if (token == null) throw StateError('Waiting for FCM registration');
      if (_api != api || api.session.token != sessionToken || sessionToken == null) return;
      _token = token;
      failure = 'registration_failed';
      final result = await _send(api, token);
      if (_api == api && api.session.token == sessionToken) {
        status.value = result;
        NotifyService.I.pushActive = result.registered;
      }
    } catch (_) {
      if (_api == api && api.session.token == sessionToken) {
        NotifyService.I.pushActive = false;
        status.value = PushConnectionStatus(failure);
      }
    } finally {
      _registering = false;
      // Recover from offline login, slow APNs token creation and transient server errors.
      if (_api != null && _registerAgain) {
        _registerAgain = false;
        _retry = Timer(Duration.zero, () { if (_api != null) register(_api!); });
      } else if (_api != null && !NotifyService.I.pushActive) {
        _retry = Timer(const Duration(seconds: 30), () { if (_api != null) register(_api!); });
      }
    }
  }

  String? _voip;
  bool _voipSandbox = false;

  /// iOS PushKit token (from CallKitBridge): lets the server make the iPhone ring like a phone call.
  void setVoipToken(String token, bool sandbox) {
    _voip = token;
    _voipSandbox = sandbox;
    if (_api != null) register(_api!);
  }

  Future<PushConnectionStatus> _send(Api api, String token) async {
    String? version;
    try {
      final info = await PackageInfo.fromPlatform();
      version = '${info.version}+${info.buildNumber}';
    } catch (_) {}
    final response = await api.post('me/devices', {
      'token': token, 'platform': Platform.isIOS ? 'ios' : 'android',
      'firebase_project_id': Firebase.app().options.projectId,
      if (version != null) 'app_version': version,
      if (Platform.isIOS && _voip != null) ...{'voip_token': _voip, 'apns_sandbox': _voipSandbox},
    });
    return PushConnectionStatus.fromRegistration(response);
  }

  /// Explicit user check: verifies only this signed-in phone, without sending an alert.
  Future<void> checkConnection(Api api) async {
    if (_registering || status.value.busy) return;
    if (status.value.code == 'UNREGISTERED') {
      try { await FirebaseMessaging.instance.deleteToken(); } catch (_) {}
    }
    await register(api);
    if (!status.value.registered || _token == null) return;
    final previous = status.value;
    final sessionToken = api.session.token;
    status.value = PushConnectionStatus('checking', registered: true, busy: true);
    try {
      final response = await api.post('me/devices/check-push', {'token': _token});
      if (_api != api || api.session.token != sessionToken) return;
      status.value = PushConnectionStatus('${response['code'] ?? 'check_unavailable'}',
        registered: true, voipConfigured: previous.voipConfigured, needsMigration: previous.needsMigration);
      if (response['accepted'] != true) NotifyService.I.pushActive = false;
    } catch (_) {
      if (_api == api && api.session.token == sessionToken) {
        status.value = PushConnectionStatus('check_unavailable',
          registered: true, voipConfigured: previous.voipConfigured, needsMigration: previous.needsMigration);
      }
    }
  }

  /// Stops pushes to this phone (sign-out, or notifications turned off in the app).
  Future<void> unregister(Api? api) async {
    NotifyService.I.pushActive = false;
    status.value = const PushConnectionStatus('signed_out');
    _retry?.cancel();
    final t = _token;
    final registeredApi = _api;
    _api = null;
    if (t == null) return;
    try { await (api ?? registeredApi)?.post('me/devices/remove', {'token': t}); } catch (_) {}
    _token = null;
    try { await FirebaseMessaging.instance.deleteToken(); } catch (_) {}
  }
}
