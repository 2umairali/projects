<?php
namespace App\Services;

use App\Events\StateChanged;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RealtimeUpdates
{
    public static function users(array $ids, array $data): void
    {
        self::publish(array_map(fn ($id) => 'user.'.(int) $id, array_values(array_unique(array_filter($ids)))), $data);
    }
    public static function workspace(int $id, array $data): void
    {
        if ($id > 0) self::publish(['workspace.'.$id], $data);
    }
    private static function publish(array $channels, array $data): void
    {
        if (!$channels || config('broadcasting.default') === 'null') return;
        DB::afterCommit(function () use ($channels, $data) {
            try { event(new StateChanged($channels, $data)); }
            catch (\Throwable $e) { Log::warning('Realtime delivery unavailable', ['exception' => get_class($e)]); }
        });
    }
}
