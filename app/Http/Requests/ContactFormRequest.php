<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'nullable|regex:/^03[0-9]{9}$/',
            'subject' => 'required|in:General Inquiry,Booking Issue,Order Issue,Report a User,Technical Problem,Other',
            'message' => 'required|string|min:20|max:1000',
        ];
    }
}
