<?php

namespace App\Services;

use App\Models\ReservedUsername;
use App\Models\User;

class UsernameAvailability
{
    public function __construct(private readonly CyberPanelMailbox $mailbox) {}

    /**
     * Returns null when the username can be registered, otherwise the
     * reason it can't.
     */
    public function problem(string $username, bool $allowReserved = false): ?string
    {
        $username = strtolower(trim($username));
        $min = config('dahify.username.min');
        $max = config('dahify.username.max');

        if (strlen($username) < $min || strlen($username) > $max) {
            return "Use {$min} to {$max} characters.";
        }

        if (! preg_match(config('dahify.username.pattern'), $username)) {
            return 'Use letters, numbers, and single dots, dashes or underscores between them.';
        }

        if (! $allowReserved && (in_array($username, config('dahify.username.reserved'), true) || ReservedUsername::blocking($username))) {
            return 'That username is reserved.';
        }

        // Soft-deleted accounts (if the SaaS app uses SoftDeletes on User)
        // keep their name so nobody inherits their old mail. If the SaaS
        // User model doesn't use SoftDeletes, ::withTrashed() is a no-op.
        $query = User::query();
        if (in_array(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses_recursive(User::class), true)) {
            $query = User::withTrashed();
        }

        if ($query->where('username', $username)->exists() || $this->mailbox->exists($username)) {
            return 'That username is already taken.';
        }

        return null;
    }
}
