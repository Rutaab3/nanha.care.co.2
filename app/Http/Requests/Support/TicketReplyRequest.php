<?php

namespace App\Http\Requests\Support;

use Illuminate\Foundation\Http\FormRequest;

class TicketReplyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'content' => 'required|string|min:5|max:2000',
            'is_internal_note' => 'nullable|boolean',
        ];
    }
}
