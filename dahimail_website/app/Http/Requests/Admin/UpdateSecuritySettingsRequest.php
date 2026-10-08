<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSecuritySettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'max_login_attempts' => ['required', 'integer', 'min:1', 'max:20'],
            'lockout_minutes' => ['required', 'integer', 'min:1', 'max:60'],
            'captcha_enabled' => ['sometimes', 'boolean'],
            'captcha_site_key' => ['nullable', 'string', 'max:255'],
            'captcha_secret_key' => ['nullable', 'string', 'max:255'],
            'two_factor_admin_only' => ['sometimes', 'boolean'],
            'single_session' => ['sometimes', 'boolean'],
            'password_min_length' => ['required', 'integer', 'min:6', 'max:30'],
            'password_require_uppercase' => ['sometimes', 'boolean'],
            'password_require_numbers' => ['sometimes', 'boolean'],
            'password_require_symbols' => ['sometimes', 'boolean'],
            'session_lifetime_minutes' => ['required', 'integer', 'min:5', 'max:1440'],
            'ip_blocking_enabled' => ['sometimes', 'boolean'],
            'location_blocking_enabled' => ['sometimes', 'boolean'],
        ];
    }
}
