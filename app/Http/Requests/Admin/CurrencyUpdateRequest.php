<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyUpdateRequest extends FormRequest
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
            'currency' => ['required', 'string', 'max:10', 'unique:currencies,currency,' . $this->route('currency')->id],
            'symbol' => ['required', 'string', 'max:10', 'unique:currencies,symbol,' . $this->route('currency')->id],
            'is_active' => ['nullable'],
        ];
    }
}
