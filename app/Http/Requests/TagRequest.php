<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
    public function prepareForValidation()
    {

        $this->merge([
            'tag_name' => ucwords($this->tag_name),
            'slug' => (empty($this->slug)) ? Str::slug($this->tag_name) : Str::slug($this->slug)
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $tag = $this->route('tag');
        return [
            'tag_name' => 'required|min:3',
            'slug' => 'required|unique:tags,slug,' . $tag?->id,
        ];
    }
}
