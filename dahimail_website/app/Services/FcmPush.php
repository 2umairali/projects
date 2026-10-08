<?php

namespace App\Services;

use App\Models\User;
use Google\Auth\Credentials\ServiceAccountCredentials;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Firebase Cloud Messaging (HTTP v1) – every phone and browser a person is signed in on (table device_tokens).
 *
 *  • sendToUser()  → a normal, visible notification (messages, friend requests, …). Android shows it by itself even when the
 *                    app is closed.
 *  • sendCall()    → an INCOMING CALL. Android gets a high-priority DATA-ONLY message (the app turns it into the full-screen ringing
 *                    screen – a message that carries a "notification" block can NOT do that when the app is closed).
 *                    iPhone gets a PushKit VoIP push (ApnsVoip) when the app registered one, otherwise a loud time-sensitive alert.
 *  • sendSilent()  → data only, for "the caller hung up" / "answered on another device".
 *
 * Setup: Firebase console → Project settings → Service accounts → "Generate new private key". Upload the JSON OUTSIDE public/
 * and set  FIREBASE_CREDENTIALS=/full/path/key.json  in .env.  iOS also needs the APNs key uploaded in Firebase console →
 * Project settings → Cloud Messaging → Apple app configuration.
 */
class FcmPush
{
    private const SCOPE = 'https://www.googleapis.com/auth/firebase.messaging';

    private function credentialsPath(): ?string
    {
        $path = config('services.fcm.credentials');
        if (!is_string($path) || trim($path) === '') return null;
        // HTTP requests and artisan have different working directories.
        return str_starts_with($path, '/') || preg_match('/^[A-Za-z]:[\\\\\/]/', $path) ? $path : base_path($path);
    }

    public function enabled(): bool
    {
        return $this->configurationError() === null;
    }

    /** Local configuration only: this does not imply that Google accepted a push. */
    public function configurationError(): ?string
    {
        $p = $this->credentialsPath();
        if (!$p || !is_file($p) || !is_readable($p)) return 'FIREBASE_CREDENTIALS must point to a readable service-account JSON file.';
        $json = json_decode((string) file_get_contents($p), true);
        foreach (['project_id', 'client_email', 'private_key'] as $field) {
            if (!is_array($json) || !is_string($json[$field] ?? null) || trim($json[$field]) === '') {
                return 'Firebase service-account JSON is invalid or missing required fields.';
            }
        }
        if (!openssl_pkey_get_private($json['private_key'])) return 'Firebase service-account private key is invalid.';
        return null;
    }

    /** @return array<int,object> one row per signed-in device */
    private function devices(int $userId): array
    {
        try {
            return DB::table('device_tokens')->where('user_id', $userId)->get()->all();
        } catch (\Throwable $e) {
            return [];
        }
    }

    protected function auth(): ?array
    {
        $json = json_decode((string) file_get_contents($this->credentialsPath()), true);
        $project = $json['project_id'] ?? null;
        if (!$project) return null;
        $access = Cache::remember('fcm_access_token', 3000, function () use ($json) {
            $creds = new ServiceAccountCredentials(self::SCOPE, $json);
            return $creds->fetchAuthToken()['access_token'] ?? null;
        });
        return $access ? ['project' => $project, 'token' => $access] : null;
    }

    /** FCM data values must all be strings. */
    private function strings(array $data): array
    {
        return array_map(fn ($v) => is_bool($v) ? ($v ? '1' : '0') : (is_scalar($v) ? (string) $v : json_encode($v)), $data);
    }

    public function projectId(): ?string
    {
        if (!$this->enabled()) return null;
        return json_decode((string) file_get_contents($this->credentialsPath()), true)['project_id'];
    }

    /** Provider validation only: accepted does not prove receipt on a phone. No tokens/keys in the result. */
    public function probeToken(string $token, string $platform): array
    {
        if (!$this->enabled()) return ['accepted' => false, 'code' => 'server_unconfigured'];
        try {
            $auth = $this->auth();
            if (!$auth) return ['accepted' => false, 'code' => 'authentication_unavailable'];
            $message = ['token' => $token, 'data' => ['type' => 'push_connection_check']];
            if ($platform === 'android') $message['android'] = ['priority' => 'HIGH', 'ttl' => '30s'];
            return $this->post($auth, $message, $token, true);
        } catch (\Throwable) {
            return ['accepted' => false, 'code' => 'provider_unreachable'];
        }
    }

    private function post(array $auth, array $message, string $token, bool $validateOnly = false): array
    {
        $payload = ['message' => $message];
        if ($validateOnly) $payload['validate_only'] = true;
        for ($attempt = 0; $attempt < 2; $attempt++) {
            $res = Http::withToken($auth['token'])->timeout(6)->post("https://fcm.googleapis.com/v1/projects/{$auth['project']}/messages:send", $payload);
            if ($res->status() !== 401 || $attempt === 1) break;
            // Renew and retry this alert; waiting for the next call loses the current invitation.
            Cache::forget('fcm_access_token');
            $renewed = $this->auth();
            if (!$renewed) break;
            $auth = $renewed;
        }
        if ($res->successful()) return ['accepted' => true, 'code' => 'accepted'];
        $code = collect($res->json('error.details', []))->pluck('errorCode')->filter()->first() ?? $res->json('error.status', 'UNKNOWN');
        // Return only known provider codes, never the provider's free-form response/body.
        if (!in_array($code, ['UNREGISTERED', 'SENDER_ID_MISMATCH', 'INVALID_ARGUMENT', 'THIRD_PARTY_AUTH_ERROR', 'QUOTA_EXCEEDED', 'UNAVAILABLE', 'INTERNAL', 'UNAUTHENTICATED', 'PERMISSION_DENIED', 'NOT_FOUND'], true)) $code = 'UNKNOWN';
        if ($code === 'UNREGISTERED' && !$validateOnly) {
            DB::table('device_tokens')->where('token', $token)->delete();
        }
        if ($res->status() === 401) Cache::forget('fcm_access_token');
        Log::warning('FCM send rejected', ['http_status' => $res->status(), 'code' => $code, 'validation_only' => $validateOnly]);
        return ['accepted' => false, 'code' => $code];
    }

    // ───────────────────────── visible notification ─────────────────────────

    public function sendToUser(User $user, string $title, string $body = '', array $data = [], array $opts = []): void
    {
        if (!$this->enabled()) return;
        $devices = $this->devices($user->id);
        if (!$devices) return;
        try {
            $auth = $this->auth();
            if (!$auth) return;
            $data = $this->strings($data);
            [$label, $icon] = \App\Support\PushPresentation::for($data);
            $body = mb_strimwidth($body, 0, 240, '…');
            $channel = $opts['channel'] ?? 'dm_push';
            foreach ($devices as $d) {
                try {
                    $message = ['token' => $d->token, 'data' => $data + ['title' => $title, 'body' => $body]];
                    if (($d->platform ?? '') === 'web') {
                        // browsers: the service worker (firebase-messaging-sw.js) shows it, so it must stay data-only + a "webpush" hint
                        $message['data'] += ['title' => $title, 'body' => $body];
                        $message['webpush'] = ['headers' => ['Urgency' => 'high', 'TTL' => (string) ($opts['ttl'] ?? 86400)]];
                    } else {
                        $systemTitle = str_starts_with(strtolower($title), strtolower($label)) ? $title : $label.' · '.$title;
                        $hasSender = trim($data['sender_name'] ?? '') !== '';
                        if ($hasSender) $systemTitle = $data['sender_name'];
                        $systemBody = $hasSender ? \App\Support\PushPresentation::action($data).($body !== '' ? ' · '.$body : '') : $body;
                        $message['notification'] = ['title' => $systemTitle, 'body' => $systemBody];
                        $message['android'] = [
                            'priority' => 'HIGH',
                            'ttl' => ((int) ($opts['ttl'] ?? 86400)) . 's',
                            'notification' => array_filter(['channel_id' => $channel, 'icon' => $hasSender ? 'ic_stat_notify' : 'ic_stat_'.$icon, 'image' => filter_var($data['sender_avatar'] ?? '', FILTER_VALIDATE_URL) && str_starts_with($data['sender_avatar'], 'https://') ? $data['sender_avatar'] : null, 'tag' => $opts['tag'] ?? null, 'notification_priority' => 'PRIORITY_HIGH', 'visibility' => 'PRIVATE']),
                        ];
                        $message['apns'] = [
                            'headers' => ['apns-priority' => '10', 'apns-push-type' => 'alert'],
                            'payload' => ['aps' => array_filter(['sound' => 'default', 'thread-id' => $opts['thread'] ?? null, 'mutable-content' => 1])],
                        ];
                    }
                    $this->post($auth, $message, $d->token);
                } catch (\Throwable $e) {
                    Log::warning('Push delivery failed for one device', ['platform' => $d->platform ?? 'unknown']);
                }
            }
        } catch (\Throwable $e) {
            Log::warning('FCM push skipped: ' . $e->getMessage());
        }
    }

    // ───────────────────────── incoming call ─────────────────────────

    /** $data: call_id, caller_id, caller_name, caller_avatar, video, audio_only, meeting, group, uuid … */
    public function sendCall(User $callee, array $data, int $ttl = 45): void
    {
        if (!$this->enabled() && !app(ApnsVoip::class)->enabled()) return;
        $devices = $this->devices($callee->id);
        if (!$devices) return;
        $data = $this->strings(['type' => 'call', 'ttl' => $ttl] + $data);
        $video = ($data['video'] ?? '0') === '1' && ($data['audio_only'] ?? '0') !== '1';
        $title = $video ? 'Incoming video call' : 'Incoming call';
        $body = ($data['caller_name'] ?? 'Someone') . ' is calling you…';
        try {
            $auth = null;
            try { $auth = $this->enabled() ? $this->auth() : null; }
            catch (\Throwable $e) { Log::warning('FCM authentication failed; attempting available native delivery'); }
            foreach ($devices as $d) {
                try {
                    if (($d->platform ?? '') === 'ios' && !empty($d->voip_token) && app(ApnsVoip::class)->enabled()) {
                        $ok = app(ApnsVoip::class)->send($d->voip_token, $data + ['aps' => ['alert' => $title]], (bool) ($d->apns_sandbox ?? 0), $ttl);
                        if ($ok) continue;                                                       // PushKit delivered → CallKit rings
                    }
                    if (!$auth) continue;
                    if (($d->platform ?? '') === 'ios') {
                        // no PushKit token: loud, time-sensitive banner that shows over other apps and the lock screen
                        $this->post($auth, [
                            'token' => $d->token, 'data' => $data,
                            'notification' => ['title' => $title, 'body' => $body],
                            'apns' => [
                                'headers' => ['apns-priority' => '10', 'apns-push-type' => 'alert', 'apns-expiration' => (string) (time() + $ttl)],
                                'payload' => ['aps' => ['sound' => 'ringtone.caf', 'interruption-level' => 'time-sensitive', 'category' => 'INCOMING_CALL', 'thread-id' => 'calls', 'content-available' => 1]],
                            ],
                        ], $d->token);
                    } elseif (($d->platform ?? '') === 'web') {
                        $this->post($auth, ['token' => $d->token, 'data' => $data + ['title' => $title, 'body' => $body],
                            'webpush' => ['headers' => ['Urgency' => 'high', 'TTL' => (string) $ttl]]], $d->token);
                    } else {
                        // Android: DATA-ONLY + high priority → the app's background handler shows the full-screen call screen
                        $this->post($auth, ['token' => $d->token, 'data' => $data, 'android' => ['priority' => 'HIGH', 'ttl' => $ttl . 's']], $d->token);
                    }
                } catch (\Throwable $e) {
                    Log::warning('Push delivery failed for one device', ['platform' => $d->platform ?? 'unknown']);
                }
            }
        } catch (\Throwable $e) {
            Log::warning('FCM call push skipped: ' . $e->getMessage());
        }
    }

    // ───────────────────────── silent (data only) ─────────────────────────

    /** e.g. type=call_cancel – stops the ringing on every device of this person (silent: no sound, no banner) */
    public function sendSilent(User $user, array $data): void
    {
        if (!$this->enabled() && !app(ApnsVoip::class)->enabled()) return;
        $devices = $this->devices($user->id);
        if (!$devices) return;
        $data = $this->strings($data);
        try {
            $auth = $this->enabled() ? $this->auth() : null;
            foreach ($devices as $d) {
                try {
                    // NOT via PushKit: Apple requires every VoIP push to be reported to CallKit as a NEW call, so a "cancel" sent that way
                    // would show a ghost call and, repeated, gets the app throttled. iPhones get a silent background push instead.
                    if (!$auth) continue;
                    $m = ['token' => $d->token, 'data' => $data];
                    if (($d->platform ?? '') === 'ios') $m['apns'] = ['headers' => ['apns-priority' => '5', 'apns-push-type' => 'background'], 'payload' => ['aps' => ['content-available' => 1]]];
                    elseif (($d->platform ?? '') === 'web') $m['webpush'] = ['headers' => ['Urgency' => 'high', 'TTL' => '30']];
                    else $m['android'] = ['priority' => 'HIGH', 'ttl' => '30s'];
                    $this->post($auth, $m, $d->token);
                } catch (\Throwable $e) {
                    Log::warning('Push delivery failed for one device', ['platform' => $d->platform ?? 'unknown']);
                }
            }
        } catch (\Throwable $e) {
            Log::warning('FCM silent push skipped: ' . $e->getMessage());
        }
    }
}
