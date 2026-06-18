<?php

namespace App\Http\Requests\Onboarding;

use Illuminate\Foundation\Http\FormRequest;

class ShopOwnerOnboardingRequest extends FormRequest
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
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'shop_name' => 'required|string|max:150',
            'shop_description' => 'required|string|max:2000',
            'shop_address' => 'required|string|max:500',
            'business_license' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'shop_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'shop_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'categories' => 'nullable|array',
            'categories.*' => 'string',
        ];
    }
}
