import 'package:flutter/services.dart';
import 'package:just_audio/just_audio.dart';

/// Notification sound choices. The audio files are bundled twice: as Flutter assets (preview in Settings)
/// and as Android raw resources (`android/app/src/main/res/raw/<id>.wav`) that the system notification plays.
class NotifSound {
  final String id;
  final String label;
  const NotifSound(this.id, this.label);

  static const all = <NotifSound>[
    NotifSound('default', 'Phone default'),
    NotifSound('chime', 'Chime'),
    NotifSound('bell', 'Bell'),
    NotifSound('tritone', 'Tri-tone'),
    NotifSound('ping', 'Ping'),
    NotifSound('pop', 'Pop'),
    NotifSound('silent', 'Silent'),
  ];

  static String labelOf(String id) => all.firstWhere((s) => s.id == id, orElse: () => all.first).label;
}

/// Plays a notification sound inside the app (preview in Settings, and "sound when the app is open").
class SoundPlayer {
  static final AudioPlayer _p = AudioPlayer();

  static Future<void> play(String id) async {
    try {
      if (id == 'silent') return;
      if (id == 'default') id = 'chime'; // the system "alert" sound is silent on many phones, so the app uses its own chime
      await _p.stop();
      await _p.setAsset('assets/sounds/$id.wav');
      await _p.play();
    } catch (_) {}
  }
}
