<?php
namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

/** Invalidation only: clients fetch authorized state through existing endpoints. */
class StateChanged implements ShouldBroadcastNow
{
    public function __construct(private array $channels, private array $data) {}
    public function broadcastOn(): array { return array_map(fn ($name) => new PrivateChannel($name), $this->channels); }
    public function broadcastAs(): string { return 'state.changed'; }
    public function broadcastWith(): array { return $this->data; }
}
