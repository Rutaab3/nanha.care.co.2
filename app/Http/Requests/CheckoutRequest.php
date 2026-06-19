<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|regex:/^03[0-9]{9}$/',
            'address' => 'required|string|max:300',
            'city' => 'required|string',
            'province' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'notes' => 'nullable|string|max:500',
            'payment_method' => 'required|in:cod,jazzcash',
        ];
    }
}
