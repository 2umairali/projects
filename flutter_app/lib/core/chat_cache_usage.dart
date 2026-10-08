// ============================================================================
// HOW TO USE ChatCache in your FriendChatPage / chat screen (Module 6)
// ============================================================================
//
// 1. In initState (or when conversationId becomes known):
//
//    await ChatCache.I.init(session.userId.toString());
//    final cached = ChatCache.I.getMessages(conversationId);
//    if (cached.isNotEmpty) {
//      setState(() => messages = cached);   // instant render – no blank screen
//    }
//
// 2. After network fetch succeeds:
//
//    final fresh = await api.getMessages(conversationId);
//    await ChatCache.I.putMessages(conversationId, fresh);
//    if (mounted) setState(() => messages = fresh);
//
// 3. On real-time new message (from FCM / Echo / poll):
//
//    await ChatCache.I.appendMessage(conversationId, newMsg);
//    // then update the UI list if the chat is currently open
//
// 4. On sign-out:
//
//    await ChatCache.I.close();
//
// ============================================================================

import 'chat_cache.dart';

/// Tiny helper that can be mixed into a chat StatefulWidget.
mixin InstantChatCacheMixin<T extends StatefulWidget> on State<T> {
  List<Map<String, dynamic>> messages = [];

  Future<void> loadWithCache({
    required int conversationId,
    required String userId,
    required Future<List<Map<String, dynamic>>> Function() fetch,
  }) async {
    await ChatCache.I.init(userId);
    final cached = ChatCache.I.getMessages(conversationId);
    if (cached.isNotEmpty && mounted) {
      setState(() => messages = cached);
    }
    try {
      final fresh = await fetch();
      await ChatCache.I.putMessages(conversationId, fresh);
      if (mounted) setState(() => messages = fresh);
    } catch (_) {
      // keep showing cached data on network error
    }
  }
}
