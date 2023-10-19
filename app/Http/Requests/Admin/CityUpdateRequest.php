<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CityUpdateRequest extends FormRequest
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
            // 'country_id' => ['required', 'integer', 'exists:countries,id'],
            'name' => ['required', 'json'],
            'slug' => ['required', 'string', 'max:50', 'unique:cities,slug' . $this->city->id],
            'is_active' => ['required'],
        ];
    }
}
