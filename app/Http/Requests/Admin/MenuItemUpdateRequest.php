<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MenuItemUpdateRequest extends FormRequest
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
            // 'menu_category_id' => ['required', 'integer', 'exists:menu_categories,id'],
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'is_active' => ['required', 'boolean'],
            'is_veg' => ['required', 'boolean'],
            'is_popular' => ['required', 'boolean'],
            'position' => ['required', 'integer'],

        ];
    }
}
