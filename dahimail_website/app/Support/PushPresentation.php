<?php

namespace App\Support;

final class PushPresentation
{
    public static function action(array $data): string
    {
        return match ($data['type'] ?? '') {
            'chat', 'message', 'contact_reply' => '💬 sent you a chat',
            'email_received' => '✉ sent an email',
            'email_failed', 'email_bounced' => '✉ Email delivery failed',
            'email_sent' => '✉ Email accepted for sending',
            'email_delivered' => '✉ Email delivered',
            'friend_request' => '👤 sent a friend request',
            'friend_accepted' => '👤 accepted your friend request',
            'meeting_updated' => '📅 updated the meeting',
            'friend_meeting' => '📅 sent a meeting link',
            default => self::for($data)[0],
        };
    }

    /** System notification title/icon when the mobile app is not running. */
    public static function for(array $data): array
    {
        $type = (string) ($data['type'] ?? '');
        if (str_contains($type, 'meeting')) return ['Meeting', 'meeting'];
        if (str_contains($type, 'call')) {
            $video = in_array($data['video'] ?? false, [true, 1, '1', 'true'], true) && !in_array($data['audio_only'] ?? false, [true, 1, '1', 'true'], true);
            return [(str_contains($type, 'missed') ? 'Missed ' : '').($video ? 'video' : 'audio').' call', $video ? 'video' : 'call'];
        }
        if (str_contains($type, 'email') || str_starts_with($type, 'mail_')) return [in_array($type, ['email_failed', 'email_bounced']) ? 'Email delivery failed' : 'Email', 'email'];
        if (in_array($type, ['chat', 'message', 'new_conversation', 'contact_reply'])) return ['Chat', 'chat'];
        if (str_starts_with($type, 'friend')) return ['Friends', 'notify'];
        if (str_contains($type, 'security')) return ['Security', 'notify'];
        if (preg_match('/billing|payment|plan|trial/', $type)) return ['Billing', 'notify'];
        if (str_contains($type, 'campaign')) return ['Campaign', 'notify'];
        if (str_contains($type, 'workflow')) return ['Workflow', 'notify'];
        if (str_contains($type, 'team')) return ['Team', 'notify'];
        return ['Update', 'notify'];
    }
}
