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
            'address' => 'required|string|max:300',
            'city' => 'required|string',
            'phone' => 'required|regex:/^03[0-9]{9}$/',
            'payment_method' => 'required|in:cod,card',
        ];
    }
}
