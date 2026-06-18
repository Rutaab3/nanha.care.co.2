<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminActionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'action' => 'required|in:suspend,ban,restore,delete',
            'reason' => 'required_if:action,ban|nullable|string|max:500',
            'duration' => 'nullable|in:7,30,90,permanent',
        ];
    }
}
