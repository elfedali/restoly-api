<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TableStoreRequest extends FormRequest
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
            'salle_id' => ['required', 'integer', 'exists:salles,id'],
            'name' => ['required', 'string', 'max:50'],
            'description' => ['nullable', 'string'],
            'capacity' => ['required', 'integer'],
        ];
    }
}
