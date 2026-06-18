<?php

namespace App\Http\Requests\Onboarding;

use Illuminate\Foundation\Http\FormRequest;

class BabysitterOnboardingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:100',
            'dob' => 'required|date|before:today',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'cnic' => 'required|regex:/^[0-9]{5}-[0-9]{7}-[0-9]{1}$/',
            'cnic_front' => 'nullable|image|mimes:jpeg,png,jpg,gif,pdf|max:5120',
            'cnic_back' => 'nullable|image|mimes:jpeg,png,jpg,gif,pdf|max:5120',
            'specializations' => 'required|array|min:1',
            'specializations.*' => 'string',
            'experience' => 'required|string|min:50|max:2000',
            'hourly_rate' => 'required|numeric|min:100',
            'availability' => 'nullable|array',
            'availability.*' => 'string',
            'police_clearance' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'training_cert' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ];
    }
}
