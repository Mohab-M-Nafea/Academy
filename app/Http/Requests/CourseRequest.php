<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:8', 'max:155'],
            'small_description' => ['required', 'min:24', 'max:255'],
            'description' => ['required', 'min:24'],
            'price' => ['required', 'integer'],
            'image' => ['nullable', 'image'],
            'category' => ['required', 'exists:categories,id'],
            'teacher' => ['required', 'exists:teachers,id']
        ];
    }

    public function attributes(): array
    {
        return [
            'small_description' => 'Small Description'
        ];
    }
}
