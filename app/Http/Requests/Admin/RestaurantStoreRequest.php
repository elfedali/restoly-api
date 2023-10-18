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
            'owner_id' => ['required', 'integer', 'exists:owners,id'],
            'district_id' => ['required', 'integer', 'exists:districts,id'],
            'address' => ['nullable', 'string'],
            'approvedby_id' => ['nullable', 'integer', 'exists:approvedbies,id'],
            'name' => ['required', 'json'],
            'slug' => ['required', 'string', 'max:128', 'unique:restaurants,slug'],
            'description' => ['nullable', 'json'],
            'is_active' => ['required'],
            'longitude' => ['nullable', 'numeric'],
            'latitude' => ['nullable', 'numeric'],
            'currency_id' => ['required', 'integer', 'exists:currencies,id'],
            'meta_title' => ['nullable', 'json'],
            'meta_description' => ['nullable', 'json'],
            'meta_keywords' => ['nullable', 'json'],
        ];
    }
}
