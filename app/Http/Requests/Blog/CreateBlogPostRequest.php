<?php

namespace App\Http\Requests\Blog;

use App\Enums\BlogCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateBlogPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('excerpt')) {
            $this->merge([
                'excerpt' => trim($this->input('excerpt')),
            ]);
        }

        if ($this->has('tags') && is_string($this->input('tags'))) {
            $this->merge([
                'tags' => array_values(array_filter(array_map('trim', explode(',', $this->input('tags'))))),
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:200',
            'slug' => 'required|string|unique:blog_posts,slug',
            'content' => 'required|string|min:200',
            'excerpt' => 'required|string|max:200',
            'category' => ['required', Rule::in(BlogCategory::values())],
            'cover_image' => 'required|image|mimes:jpeg,png,webp|max:3072',
            'tags' => 'nullable|array|max:10',
        ];
    }
}
