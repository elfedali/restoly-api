<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'first_name' => ['nullable', 'string'],
            'last_name' => ['nullable', 'string'],
            'username' => ['required', 'string', 'min:4', 'max:255', 'unique:users'],
            //'role' => ['required', 'string', 'in:admin,user,subscriber,moderator'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}
