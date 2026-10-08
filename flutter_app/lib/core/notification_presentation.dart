import 'package:flutter/material.dart';

/// Presentation shared by the notification center and local system alerts.
class NotificationPresentation {
  final String label, kind;
  final IconData icon;
  final Color color;
  const NotificationPresentation(this.label, this.kind, this.icon, this.color);

  String action(Map data) => switch ('${data['type'] ?? ''}') {
    'chat' || 'message' || 'contact_reply' => 'sent you a chat',
    'email_received' => 'sent an email',
    'email_sent' => 'Email accepted for sending',
    'email_delivered' => 'Email delivered',
    'friend_request' => 'sent a friend request',
    'friend_accepted' => 'accepted your friend request',
    'meeting_updated' => 'updated the meeting',
    'friend_meeting' => 'sent a meeting link',
    _ => label,
  };

  static String sender(Map data) {
    for (final key in ['sender_name', 'caller_name', 'from_name', 'title']) {
      final value = '${data[key] ?? ''}'.trim();
      if (value.isNotEmpty) return value;
    }
    return 'Dahimail';
  }

  static String? avatar(Map data) {
    final value = '${data['sender_avatar'] ?? data['caller_avatar'] ?? data['from_avatar'] ?? ''}';
    return value.isEmpty ? null : value;
  }

  static bool flag(dynamic value) => value == true || value == 1 || value == '1' || value == 'true';

  factory NotificationPresentation.from(Map data) {
    final type = '${data['type'] ?? ''}'.toLowerCase();
    final text = '${data['title'] ?? ''} ${data['body'] ?? ''}'.toLowerCase();
    if (type.contains('meeting')) return const NotificationPresentation('Meeting', 'meeting', Icons.groups_rounded, Color(0xFF7C3AED));
    if (type.contains('call')) {
      final video = !flag(data['audio_only']) && (flag(data['video']) || type.contains('video') || text.contains('video call'));
      final missed = type.contains('missed') || text.contains('missed');
      return NotificationPresentation('${missed ? 'Missed ' : ''}${video ? 'video' : 'audio'} call', video ? 'video_call' : 'audio_call',
          video ? (missed ? Icons.videocam_off_rounded : Icons.videocam_rounded) : (missed ? Icons.phone_missed_rounded : Icons.call_rounded),
          missed ? const Color(0xFFDC2626) : const Color(0xFF0D9488));
    }
    if (type.contains('email') || type.contains('mail_')) {
      final failed = type.contains('failed') || type.contains('bounced');
      return NotificationPresentation(failed ? 'Email delivery failed' : 'Email', 'email', failed ? Icons.mark_email_unread_rounded : Icons.mail_rounded,
          failed ? const Color(0xFFDC2626) : const Color(0xFF2563EB));
    }
    if (type == 'chat' || type.contains('message') || type.contains('conversation') || type.contains('reply')) return const NotificationPresentation('Chat', 'chat', Icons.chat_bubble_rounded, Color(0xFF15803D));
    if (type.startsWith('friend')) return const NotificationPresentation('Friends', 'friends', Icons.person_add_alt_1_rounded, Color(0xFFD97706));
    if (type.contains('security') || type.contains('verify')) return const NotificationPresentation('Security', 'security', Icons.shield_rounded, Color(0xFFEA580C));
    if (RegExp('billing|payment|plan|trial').hasMatch(type)) return const NotificationPresentation('Billing', 'billing', Icons.credit_card_rounded, Color(0xFF7C3AED));
    if (type.contains('campaign')) return const NotificationPresentation('Campaign', 'campaign', Icons.campaign_rounded, Color(0xFF2563EB));
    if (type.contains('workflow')) return const NotificationPresentation('Workflow', 'workflow', Icons.account_tree_rounded, Color(0xFF0D9488));
    if (type.contains('team')) return const NotificationPresentation('Team', 'team', Icons.groups_rounded, Color(0xFF2563EB));
    if (type.contains('deal')) return const NotificationPresentation('Deal', 'deal', Icons.handshake_rounded, Color(0xFF15803D));
    return const NotificationPresentation('Update', 'general', Icons.notifications_rounded, Color(0xFF64748B));
  }
}

/// Call/system history entries are events, so delivery ticks do not apply.
bool hasMessageReceipt(Map message) => message['mine'] == true && !const ['call', 'system'].contains(message['message_kind'] ?? message['kind']);
