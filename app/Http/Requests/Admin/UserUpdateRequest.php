<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string'],
            // 'email' => ['required', 'email'],
            'is_active' => ['nullable', 'boolean'],
            'role' => ['required', 'string', 'in:admin,user,commercial'],
            'first_name' => ['nullable', 'string'],
            'last_name' => ['nullable', 'string'],
            'bio' => ['nullable', 'string'],
            'telephone' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'country' => ['nullable', 'string'],
            'postal_code' => ['nullable', 'string'],
            'avatar' => ['nullable', 'string'],
            'email_notification' => ['nullable', 'boolean'],
            'sms_notification' => ['nullable', 'boolean'],

        ];
    }
}
