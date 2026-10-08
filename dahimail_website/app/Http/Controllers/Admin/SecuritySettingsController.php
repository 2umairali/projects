<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\SecurityAuditLogger;
use App\Support\SecuritySettings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SecuritySettingsController extends Controller
{
    public function index(): View
    {
        $settings = SecuritySettings::get();

        return view('admin.security-settings.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'max_login_attempts' => 'required|integer|min:1|max:20',
            'lockout_minutes' => 'required|integer|min:1|max:60',
            'captcha_enabled' => 'sometimes|boolean',
            'captcha_site_key' => 'nullable|string|max:255',
            'captcha_secret_key' => 'nullable|string|max:255',
            'two_factor_admin_only' => 'sometimes|boolean',
            'single_session' => 'sometimes|boolean',
            'password_min_length' => 'required|integer|min:6|max:30',
            'password_require_uppercase' => 'sometimes|boolean',
            'password_require_numbers' => 'sometimes|boolean',
            'password_require_symbols' => 'sometimes|boolean',
            'session_lifetime_minutes' => 'required|integer|min:5|max:1440',
            'ip_blocking_enabled' => 'sometimes|boolean',
            'location_blocking_enabled' => 'sometimes|boolean',
        ]);

        // Normalize checkboxes (unchecked = absent from request)
        $booleanFields = [
            'captcha_enabled', 'two_factor_admin_only', 'single_session',
            'password_require_uppercase', 'password_require_numbers',
            'password_require_symbols', 'ip_blocking_enabled', 'location_blocking_enabled',
        ];
        foreach ($booleanFields as $field) {
            $validated[$field] = $request->boolean($field);
        }

        SecuritySettings::update($validated);

        SecurityAuditLogger::settingsChanged(auth()->user(), $request, [
            'section' => 'security',
            'changes' => array_keys($validated),
        ]);

        return back()->with('success', 'Security settings updated successfully.');
    }
}
