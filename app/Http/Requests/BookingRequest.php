<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'babysitter_id' => 'required|exists:users,id',
            'date' => 'required|date|after:today',
            'start_time' => 'required|date_format:H:i',
            'duration_hours' => 'required|integer|min:1|max:12',
            'child_ids' => 'required|array|min:1',
            'child_ids.*' => 'exists:children,id',
            'notes' => 'nullable|string|max:500',
        ];
    }
}
