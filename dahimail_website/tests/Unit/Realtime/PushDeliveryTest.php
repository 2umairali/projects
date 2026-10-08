<?php

use App\Models\User;
use App\Services\FcmPush;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
    DB::purge('sqlite');
    DB::statement('CREATE TABLE device_tokens (id INTEGER PRIMARY KEY, user_id INTEGER, token TEXT, platform TEXT)');
    DB::table('device_tokens')->insert([
        ['user_id' => 1, 'token' => 'synthetic-a', 'platform' => 'android'],
        ['user_id' => 1, 'token' => 'synthetic-b', 'platform' => 'android'],
    ]);
    Storage::fake('local');
    $key = openssl_pkey_new(['private_key_bits' => 2048]);
    openssl_pkey_export($key, $pem);
    Storage::disk('local')->put('fcm-test.json', json_encode(['project_id' => 'synthetic-project', 'client_email' => 'test@example.test', 'private_key' => $pem]));
    config(['services.fcm.credentials' => Storage::disk('local')->path('fcm-test.json'), 'services.apns.key_path' => null]);
    Cache::put('fcm_access_token', 'synthetic-access', 60);
    $this->user = new User(); $this->user->id = 1;
});

test('a failed device does not prevent high priority call delivery to another', function () {
    $sent = [];
    Http::fake(function ($request) use (&$sent) {
        $message = $request['message'];
        $sent[] = $message;
        if ($message['token'] === 'synthetic-a') throw new RuntimeException('synthetic timeout');
        return Http::response(['name' => 'delivered'], 200);
    });
    app(FcmPush::class)->sendCall($this->user, ['call_id' => 42, 'sent_at' => time()], 20);
    expect($sent)->toHaveCount(2);
    expect($sent[1]['android'])->toBe(['priority' => 'HIGH', 'ttl' => '20s']);
    expect($sent[1]['data']['call_id'])->toBe('42');
    expect($sent[1])->not->toHaveKey('notification');
});

test('configuration 404 does not delete registered devices but unregistered tokens are removed', function () {
    $unregistered = false;
    Http::fake(function () use (&$unregistered) {
        return Http::response(['error' => $unregistered ? ['details' => [['errorCode' => 'UNREGISTERED']]] : ['status' => 'NOT_FOUND']], 404);
    });
    app(FcmPush::class)->sendSilent($this->user, ['type' => 'call_cancel']);
    expect(DB::table('device_tokens')->count())->toBe(2);
    $unregistered = true;
    app(FcmPush::class)->sendSilent($this->user, ['type' => 'call_cancel']);
    expect(DB::table('device_tokens')->count())->toBe(0);
});

test('mail and social pushes carry visible high priority alerts and foreground data', function () {
    DB::table('device_tokens')->insert(['user_id' => 1, 'token' => 'synthetic-ios', 'platform' => 'ios']);
    $sent = [];
    Http::fake(function ($request) use (&$sent) { $sent[] = $request['message']; return Http::response(['name' => 'delivered'], 200); });
    app(FcmPush::class)->sendToUser($this->user, 'Email delivery failed', 'Synthetic subject', ['type' => 'email_bounced', 'notification_id' => 'synthetic-notification']);
    expect($sent)->toHaveCount(3);
    expect($sent[0]['notification']['title'])->toBe('Email delivery failed');
    expect($sent[0]['android']['notification']['icon'])->toBe('ic_stat_email');
    expect($sent[0]['android']['priority'])->toBe('HIGH');
    expect($sent[0]['data']['title'])->toBe('Email delivery failed');
    expect($sent[0]['data']['notification_id'])->toBe('synthetic-notification');
    expect($sent[2]['apns']['headers']['apns-push-type'])->toBe('alert');
    expect($sent[2]['apns']['headers']['apns-priority'])->toBe('10');
});

test('missing or invalid service-account configuration cannot mark push as enabled', function () {
    $push = app(FcmPush::class);
    config(['services.fcm.credentials' => null]);
    expect($push->enabled())->toBeFalse();
    $path = Storage::disk('local')->path('fcm-test.json');
    config(['services.fcm.credentials' => $path]);
    foreach (['not json', '{"project_id":"test"}', '{"project_id":"test","client_email":"test@example.test","private_key":"invalid"}'] as $json) {
        file_put_contents($path, $json);
        expect($push->enabled())->toBeFalse()->and($push->configurationError())->not->toBeNull();
    }
});

test('device registration retains the token but reports disabled server delivery truthfully', function () {
    foreach (['voip_token TEXT', 'app_version TEXT', 'apns_sandbox INTEGER', 'created_at TEXT', 'updated_at TEXT'] as $column) DB::statement('ALTER TABLE device_tokens ADD COLUMN '.$column);
    config(['services.fcm.credentials' => null]);
    $request = Illuminate\Http\Request::create('/api/v1/me/devices', 'POST', ['token' => 'new-synthetic-token', 'platform' => 'android', 'app_version' => '1.0.0+2']);
    $request->setUserResolver(fn () => $this->user);
    $response = app(App\Http\Controllers\Api\Mobile\MeController::class)->registerDevice($request);
    expect($response->getStatusCode())->toBe(200);
    expect($response->getData(true)['push_configured'])->toBeFalse();
    expect(DB::table('device_tokens')->where('token', 'new-synthetic-token')->value('app_version'))->toBe('1.0.0+2');
    config(['services.fcm.credentials' => Storage::disk('local')->path('fcm-test.json')]);
    $response = app(App\Http\Controllers\Api\Mobile\MeController::class)->registerDevice($request);
    expect($response->getData(true)['push_configured'])->toBeTrue();
});

test('push status diagnoses configuration and counts devices without exposing tokens', function () {
    DB::statement('ALTER TABLE device_tokens ADD COLUMN app_version TEXT');
    DB::statement('ALTER TABLE device_tokens ADD COLUMN voip_token TEXT');
    config(['services.fcm.credentials' => null]);
    $this->artisan('push:status', ['--user' => '1'])
        ->expectsOutputToContain('FIREBASE_CREDENTIALS')
        ->doesntExpectOutputToContain('synthetic-a')
        ->assertExitCode(1);
    config(['services.fcm.credentials' => Storage::disk('local')->path('fcm-test.json')]);
    $this->artisan('push:status', ['--user' => '1'])
        ->expectsOutputToContain('FCM: local credentials valid')
        ->expectsOutputToContain('Local checks only.')
        ->assertExitCode(0);
});

test('background phone alerts identify chat, video calls and meetings with labels and native icons', function () {
    $sent = [];
    Http::fake(function ($request) use (&$sent) { $sent[] = $request['message']; return Http::response(['name' => 'accepted'], 200); });
    foreach ([['type' => 'chat'], ['type' => 'missed_call', 'video' => true], ['type' => 'friend_meeting']] as $data) {
        app(FcmPush::class)->sendToUser($this->user, 'Alice', 'Synthetic alert', $data);
    }
    expect($sent[0]['notification']['title'])->toBe('Chat · Alice');
    expect($sent[0]['android']['notification']['icon'])->toBe('ic_stat_chat');
    expect($sent[2]['notification']['title'])->toBe('Missed video call · Alice');
    expect($sent[2]['android']['notification']['icon'])->toBe('ic_stat_video');
    expect($sent[4]['notification']['title'])->toBe('Meeting · Alice');
    expect($sent[4]['android']['notification']['icon'])->toBe('ic_stat_meeting');
});

test('sender identity survives database notifications through FCM while using a brand icon and action text', function () {
    $sent = [];
    Http::fake(function ($request) use (&$sent) { $sent[] = $request['message']; return Http::response(['name' => 'accepted'], 200); });
    $notification = App\Notifications\FriendNotification::request('Alice Example', 'https://example.test/avatar.jpg');
    $notification->id = 'synthetic-request';
    app(App\Listeners\SendPushForNotification::class)->handle(new Illuminate\Notifications\Events\NotificationSent($this->user, $notification, 'database'));
    expect($sent)->toHaveCount(2);
    expect($sent[0]['data']['sender_name'])->toBe('Alice Example');
    expect($sent[0]['notification']['title'])->toBe('Alice Example');
    expect($sent[0]['notification']['body'])->toContain('sent a friend request');
    expect($sent[0]['android']['notification']['image'])->toBe('https://example.test/avatar.jpg');
    expect($sent[0]['android']['notification']['icon'])->toBe('ic_stat_notify');
});

test('notification API retains sender identity for mobile and browser consumers', function () {
    DB::statement('CREATE TABLE notifications (id TEXT PRIMARY KEY, type TEXT, notifiable_type TEXT, notifiable_id INTEGER, data TEXT, read_at TEXT, created_at TEXT, updated_at TEXT)');
    $data = App\Notifications\MeetingNotification::invited('Alice Example', 'Planning', 'Tomorrow', 'synthetic-room', 'https://example.test/avatar.jpg')->toArray($this->user);
    DB::table('notifications')->insert(['id' => 'synthetic', 'type' => App\Notifications\MeetingNotification::class, 'notifiable_type' => User::class, 'notifiable_id' => 1, 'data' => json_encode($data), 'created_at' => now()]);
    Illuminate\Support\Facades\Auth::shouldReceive('user')->once()->andReturn($this->user);
    $response = app(App\Http\Controllers\NotificationController::class)->index(new Illuminate\Http\Request())->getData(true);
    expect($response['unread_count'])->toBe(1);
    expect($response['notifications'][0]['sender_name'])->toBe('Alice Example');
    expect($response['notifications'][0]['sender_avatar'])->toBe('https://example.test/avatar.jpg');
    expect($response['notifications'][0]['action_url'])->toBe('/meet/synthetic-room');
});


test('meeting updates describe the update rather than a new invitation', function () {
    $data = (new App\Notifications\MeetingNotification('Meeting changed', 'Tomorrow', '/meet/test', 'Alice', '', 'meeting_updated'))->toArray($this->user);
    expect($data['type'])->toBe('meeting_updated');
    expect(App\Support\PushPresentation::action($data))->toContain('updated the meeting');
});

test('Firebase project mismatch is exposed instead of enabling push fallback suppression', function () {
    foreach (['voip_token TEXT', 'app_version TEXT', 'apns_sandbox INTEGER', 'created_at TEXT', 'updated_at TEXT'] as $column) DB::statement('ALTER TABLE device_tokens ADD COLUMN '.$column);
    $request = Illuminate\Http\Request::create('/api/v1/me/devices', 'POST', ['token' => 'synthetic-mismatch', 'platform' => 'android', 'firebase_project_id' => 'other-project']);
    $request->setUserResolver(fn () => $this->user);
    $response = app(App\Http\Controllers\Api\Mobile\MeController::class)->registerDevice($request)->getData(true);
    expect($response['push_configured'])->toBeFalse()->and($response['push_status'])->toBe('project_mismatch');
    expect(DB::table('device_tokens')->where('token', 'synthetic-mismatch')->exists())->toBeTrue();
});

test('provider checks validate without delivery or deleting token records and reveal sender mismatch', function () {
    $requests = [];
    Http::fake(function ($request) use (&$requests) {
        $requests[] = $request->data();
        return Http::response(['error' => ['details' => [['errorCode' => 'SENDER_ID_MISMATCH']]]], 403);
    });
    $result = app(FcmPush::class)->probeToken('synthetic-a', 'android');
    expect($result)->toBe(['accepted' => false, 'code' => 'SENDER_ID_MISMATCH']);
    expect($requests[0]['validate_only'])->toBeTrue();
    expect($requests[0]['message'])->not->toHaveKey('notification');
    expect(DB::table('device_tokens')->count())->toBe(2);
});

test('expired access token retries the same incoming call with refreshed authentication', function () {
    $push = new class extends FcmPush {
        public int $authCalls = 0;
        protected function auth(): ?array { return ['project' => 'synthetic-project', 'token' => ++$this->authCalls === 1 ? 'old-access' : 'new-access']; }
    };
    $requests = [];
    Http::fake(function ($request) use (&$requests) {
        $requests[] = $request;
        return $request->hasHeader('Authorization', 'Bearer old-access') ? Http::response(['error' => ['status' => 'UNAUTHENTICATED']], 401) : Http::response(['name' => 'accepted'], 200);
    });
    $push->sendCall($this->user, ['call_id' => '55', 'uuid' => 'synthetic-call'], 20);
    expect($requests)->toHaveCount(4);
    expect($requests[0]->data()['message'])->toBe($requests[1]->data()['message']);
    expect($requests[1]->hasHeader('Authorization', 'Bearer new-access'))->toBeTrue();
});

test('push status probe reports provider result without exposing device tokens', function () {
    foreach (['app_version TEXT', 'voip_token TEXT', 'apns_sandbox INTEGER'] as $column) DB::statement('ALTER TABLE device_tokens ADD COLUMN '.$column);
    Http::fake(fn () => Http::response(['name' => 'accepted'], 200));
    $this->artisan('push:status', ['--user' => '1', '--probe' => true])
        ->expectsOutputToContain('accepted')
        ->doesntExpectOutputToContain('synthetic-a')
        ->expectsOutputToContain('no notification was sent')
        ->assertExitCode(0);
});

test('relative credential paths work when an HTTP worker runs outside the Laravel root', function () {
    $absolute = Storage::disk('local')->path('fcm-test.json');
    expect(str_starts_with($absolute, base_path().DIRECTORY_SEPARATOR))->toBeTrue();
    config(['services.fcm.credentials' => substr($absolute, strlen(base_path()) + 1)]);
    $previous = getcwd();
    try {
        chdir(sys_get_temp_dir());
        expect(app(FcmPush::class)->enabled())->toBeTrue();
        expect(app(FcmPush::class)->projectId())->toBe('synthetic-project');
    } finally {
        chdir($previous);
    }
});
