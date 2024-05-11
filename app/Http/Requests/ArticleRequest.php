<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'slug' => (empty($this->slug)) ? Str::slug($this->title) : Str::slug($this->slug),
            'published_at' => (!empty($this->published_at)) ? $this->published_at : now()
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $post = $this->route('post');
        return [
            'title' => 'required|min:5',
            'slug' => 'required|unique:articles,slug,' . $post?->id,
            'category_id' => 'nullable|exists:categories,id',
            'tags' => '',
            'status' => '',
            'published_at' => 'nullable|date',
            'user_id' => 'required|exists:users,id',
            'content' => 'nullable',
            'excerpt' => 'nullable|max:300',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ];
    }
}
