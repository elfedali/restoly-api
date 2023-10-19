<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'slug' =>  ['required', 'string', 'max:50', 'unique:categories,slug,' . $this->category->id],
            'thumbnail' => ['nullable', 'string'],
            'is_active' => ['required'],
        ];
    }
}
