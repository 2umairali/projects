<?php

use App\Livewire\Friends\RecentChats;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;

beforeEach(function () {
    config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:', 'activitylog.enabled' => false]);
    DB::purge('sqlite');
    DB::unprepared(file_get_contents(base_path('tests/Fixtures/realtime.sqlite.sql')));
    DB::statement('CREATE TABLE friend_requests (id INTEGER PRIMARY KEY, requester_id INTEGER, addressee_id INTEGER, status TEXT, responded_at TEXT, unfriended_at TEXT, unfriended_by INTEGER, created_at TEXT, updated_at TEXT)');
    DB::statement('CREATE TABLE workspace_members (workspace_id INTEGER, user_id INTEGER, role TEXT, status TEXT, last_active_at TEXT)');
    DB::statement('CREATE TABLE user_presence (user_id INTEGER, last_seen_at TEXT, show_presence INTEGER)');
    DB::statement('CREATE TABLE friend_chat_clears (user_id INTEGER, other_id INTEGER, before_id INTEGER)');
    foreach ([1 => 'Viewer', 2 => 'Alice', 3 => 'Bob', 4 => 'Unrelated'] as $id => $name) {
        DB::table('users')->insert(['id' => $id, 'uuid' => 'synthetic-'.$id, 'name' => $name, 'email' => $id.'@example.test', 'notification_preferences' => '{}']);
    }
    DB::table('friend_requests')->insert([
        ['requester_id' => 1, 'addressee_id' => 2, 'status' => 'accepted'],
        ['requester_id' => 3, 'addressee_id' => 1, 'status' => 'accepted'],
    ]);
    $this->actingAs(User::find(1));
});

test('an empty visible chats component receives its first conversation and unread badge without navigation', function () {
    $component = Livewire::test(RecentChats::class)
        ->assertSee('Your conversations will appear here.')
        ->assertSeeHtml('wire:poll.5s.visible');
    DB::table('friend_messages')->insert(['sender_id' => 2, 'recipient_id' => 1, 'body' => 'First incoming message', 'created_at' => now()]);
    $component->dispatch('realtime-refresh')
        ->assertSee('Alice')->assertSee('First incoming message')
        ->assertViewHas('recentChats', fn ($rows) => count($rows) === 1 && $rows[0]['unread'] === 1);
    DB::table('friend_messages')->update(['read_at' => now()]);
    $component->call('$refresh')->assertViewHas('recentChats', fn ($rows) => $rows[0]['unread'] === 0);
});

test('polling updates previews and ordering while preserving viewer privacy', function () {
    DB::table('friend_messages')->insert([
        ['sender_id' => 2, 'recipient_id' => 1, 'body' => 'Older Alice message', 'created_at' => now()],
        ['sender_id' => 3, 'recipient_id' => 1, 'body' => 'Latest Bob message', 'created_at' => now()],
    ]);
    $component = Livewire::test(RecentChats::class)->assertSeeInOrder(['Bob', 'Alice']);
    DB::table('friend_messages')->insert(['sender_id' => 2, 'recipient_id' => 1, 'body' => 'New Alice message', 'created_at' => now()]);
    DB::table('friend_messages')->insert(['sender_id' => 2, 'recipient_id' => 1, 'body' => 'Private recording', 'visible_to' => 2, 'created_at' => now()]);
    DB::table('friend_messages')->insert(['sender_id' => 4, 'recipient_id' => 3, 'body' => 'Other conversation', 'created_at' => now()]);
    $component->call('$refresh')->assertSeeInOrder(['Alice', 'Bob'])
        ->assertSee('New Alice message')->assertDontSee('Older Alice message')
        ->assertDontSee('Private recording')->assertDontSee('Other conversation');
});

test('people directory renders friends with realtime previews', function () {
    DB::table('friend_messages')->insert(['sender_id' => 2, 'recipient_id' => 1, 'body' => 'People preview', 'created_at' => now()]);
    Livewire::test(App\Livewire\Friends\FriendsHub::class)->assertSee('Alice')->assertSee('People preview');
});

test('missed call history has no delivery status or ticks in the recent conversation list', function () {
    DB::table('friend_messages')->insert(['sender_id' => 1, 'recipient_id' => 2, 'kind' => 'call', 'body' => 'Missed call', 'read_at' => now(), 'created_at' => now()]);
    Livewire::test(RecentChats::class)->assertSee('Missed call')->assertDontSee('✓')
        ->assertViewHas('recentChats', fn ($rows) => $rows[0]['status'] === null);
});
