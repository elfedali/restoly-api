<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantStoreRequest extends FormRequest
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
            'owner_id' => ['required', 'integer', 'exists:users,id'],
            'name' => ['required', 'string'],
            //'district_id' => ['required', 'integer', 'exists:districts,id'],
            'address' => ['nullable', 'string'],
            'approvedby_id' => ['nullable', 'integer', 'exists:approvedbies,id'],
            'approved_at' => ['nullable', 'date'],
            'description' => ['nullable', 'string'],
            'is_active' => ['required', 'boolean'],
            'longitude' => ['nullable', 'numeric'],
            'latitude' => ['nullable', 'numeric'],
            //'currency_id' => ['required', 'integer', 'exists:currencies,id'],
            'meta_title' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['nullable', 'integer', 'exists:categories,id'],
            'services' => ['nullable', 'array'],
            'services.*' => ['nullable', 'integer', 'exists:services,id'],

            'phones' => ['nullable', 'array'],
            'phones.*' => ['nullable', 'string', 'unique:phones,phone'],

            //'images' => ['nullable', 'array', 'max:4'],
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ];
    }
}
