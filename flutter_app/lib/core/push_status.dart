/// A saved token, provider acceptance and phone receipt are separate checks.
class PushConnectionStatus {
  final String code;
  final bool registered, busy;
  final bool? voipConfigured;
  final bool needsMigration;
  const PushConnectionStatus(this.code, {this.registered = false, this.busy = false, this.voipConfigured, this.needsMigration = false});

  factory PushConnectionStatus.fromRegistration(Map response) {
    final configured = response['push_configured'] == true;
    return PushConnectionStatus(
      '${response['push_status'] ?? (configured ? 'registered' : 'server_unconfigured')}',
      registered: configured,
      voipConfigured: response['voip_configured'] == true,
      needsMigration: response['registration_needs_migration'] == true,
    );
  }

  String get message => switch (code) {
    'connecting' => 'Connecting this phone for background alerts…',
    'checking' => 'Checking this phone’s connection with Firebase…',
    'registered' => 'Registered with the server. Check the connection below, then try a real call while the app is closed.',
    'accepted' => 'Firebase accepted this phone’s registration check. Try a real call or message while using another app to confirm delivery.',
    'server_unconfigured' => 'The website’s Firebase credentials are missing or invalid. The server administrator must configure background delivery.',
    'project_mismatch' || 'SENDER_ID_MISMATCH' => 'The app and website use different Firebase projects. Install the matching app or update the server’s Firebase configuration.',
    'UNREGISTERED' => 'Firebase no longer recognizes this phone. Use Check connection to register it again.',
    'PERMISSION_DENIED' || 'UNAUTHENTICATED' || 'authentication_unavailable' => 'Firebase rejected the website’s credentials. The server administrator must check Cloud Messaging access.',
    'THIRD_PARTY_AUTH_ERROR' => 'Apple push credentials are missing or rejected. The server administrator must check the iOS push configuration.',
    'registration_failed' => 'The website could not save this phone for background alerts. Check the connection again; if it persists, ask the administrator to check device registration and database migrations.',
    'firebase_unavailable' => 'This phone could not obtain a push token. Check the network and Google Play services, then retry.',
    'apns_pending' => 'Waiting for Apple push registration. Check your connection, then retry.',
    'provider_unreachable' => 'The website could not reach Firebase. Retry or ask the administrator to check the server connection.',
    'check_unavailable' => 'The website could not complete this check. Apply the background-push server update and try again.',
    'signed_out' => 'Sign in to receive background calls and messages.',
    _ => 'Background delivery is not verified. Check the connection below.',
  };
}
