<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'category' => ucwords($this->category),
            'slug' => (empty($this->slug)) ? Str::slug($this->category) : Str::slug($this->slug)
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $category = $this->route('category');
        return [
            'category' => 'required|min:3|unique:categories,category,' . $category?->id,
            'slug' => 'required|unique:categories,slug,' . $category?->id,
        ];
    }
}
