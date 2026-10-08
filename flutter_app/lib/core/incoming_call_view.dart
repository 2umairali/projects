import 'package:flutter/material.dart';
import 'notification_presentation.dart';
import 'widgets.dart';

/// Shared identity/type contract for room calls, legacy audio and Android CallKit.
class IncomingCallPresentation {
  final String name;
  final String? avatar;
  final bool video, meeting;
  const IncomingCallPresentation({required this.name, this.avatar, this.video = false, this.meeting = false});

  factory IncomingCallPresentation.from(Map data) {
    final peer = data['peer'] is Map ? data['peer'] as Map : const {};
    final avatar = '${data['caller_avatar'] ?? peer['avatar_url'] ?? ''}';
    return IncomingCallPresentation(
      name: '${data['caller_name'] ?? peer['name'] ?? 'Someone'}',
      avatar: avatar.isEmpty ? null : avatar,
      video: NotificationPresentation.flag(data['video']) && !NotificationPresentation.flag(data['audio_only']),
      meeting: NotificationPresentation.flag(data['group']) || NotificationPresentation.flag(data['group_invite']),
    );
  }

  String get status => meeting ? 'Incoming Meeting…' : video ? 'Incoming Video Call…' : 'Incoming Audio Call…';
  static const background = Color(0xFF111118);
}

class IncomingCallView extends StatelessWidget {
  final IncomingCallPresentation call;
  final VoidCallback onAccept, onDecline;
  final bool busy;
  const IncomingCallView({super.key, required this.call, required this.onAccept, required this.onDecline, this.busy = false});

  @override
  Widget build(BuildContext context) => ColoredBox(
    color: IncomingCallPresentation.background,
    child: SafeArea(child: LayoutBuilder(builder: (context, constraints) => SingleChildScrollView(
      child: ConstrainedBox(constraints: BoxConstraints(minHeight: constraints.maxHeight), child: IntrinsicHeight(
        child: Padding(padding: const EdgeInsets.symmetric(horizontal: 24, vertical: 24), child: Column(children: [
          const Spacer(flex: 2),
          Avatar(call.name, url: call.avatar, radius: 56),
          const SizedBox(height: 22),
          Text(call.name, textAlign: TextAlign.center, style: const TextStyle(color: Colors.white, fontSize: 26, fontWeight: FontWeight.w800)),
          const SizedBox(height: 8),
          Text(busy ? 'Please wait…' : call.status, textAlign: TextAlign.center, style: const TextStyle(color: Colors.white70, fontSize: 16)),
          const SizedBox(height: 32),
          const Spacer(flex: 3),
          Directionality(textDirection: TextDirection.ltr, child: Row(mainAxisAlignment: MainAxisAlignment.spaceEvenly, children: [
            _action('Accept', call.video ? Icons.videocam_rounded : Icons.call_rounded, const Color(0xFF16A34A), onAccept),
            _action('Decline', Icons.call_end_rounded, const Color(0xFFDC2626), onDecline),
          ])),
          const SizedBox(height: 16),
        ])),
      )),
    ))),
  );

  Widget _action(String label, IconData icon, Color color, VoidCallback action) => Column(mainAxisSize: MainAxisSize.min, children: [
    IconButton.filled(onPressed: busy ? null : action, tooltip: label,
      style: IconButton.styleFrom(backgroundColor: color, foregroundColor: Colors.white, disabledBackgroundColor: color.withValues(alpha: .5), padding: const EdgeInsets.all(20)),
      icon: Icon(icon, size: 30)),
    const SizedBox(height: 8),
    Text(label, style: const TextStyle(color: Colors.white70)),
  ]);
}
