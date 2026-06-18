<?php

namespace App\Http\Requests\Products;

use App\Enums\ProductCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:200',
            'description' => 'required|string|min:50',
            'price' => 'required|numeric|min:1',
            'sale_price' => 'nullable|numeric|lt:price',
            'category' => ['required', Rule::in(ProductCategory::values())],
            'stock_qty' => 'required|integer|min:0',
            'age_tags' => 'nullable|array|max:5',
            'images' => 'required|array|min:1|max:5',
            'images.*' => 'image|mimes:jpeg,png,webp|max:2048',
            'weight' => 'nullable|numeric|min:0',
        ];
    }
}
