<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
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
            'table_id' => ['required', 'integer', 'exists:tables,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'approvedby_id' => ['nullable', 'integer', 'exists:approvedbies,id'],
            'approved_at' => ['nullable'],
            'arrival_date' => ['required'],
            'departure_date' => ['nullable'],
            'status' => ['required', 'in:pending,accepted,rejected'],
            'note' => ['nullable', 'string'],
        ];
    }
}
