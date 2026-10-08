<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('user')?->id ?? $this->route('user');

        return [
            'name' => ['required', 'string', 'max:60', 'regex:/^[A-Za-z][A-Za-z\s.\'-]*$/'],
            'email' => ['required', 'email', 'max:100', "unique:users,email,{$userId}"],
            'phone' => ['nullable', 'string', 'max:20'],
            'password' => ['nullable', 'string', Password::min(10)->mixedCase()->numbers()->symbols(), 'confirmed'],
            'is_active' => ['sometimes', 'boolean'],
            'email_verified' => ['sometimes', 'boolean'],
            'is_admin' => ['sometimes', 'boolean'],
            'admin_role' => ['nullable', 'string', 'in:super_admin,admin,moderator,support'],
            'roles' => ['nullable', 'array'],
            'roles.*' => ['exists:roles,id'],
        ];
    }
}
