<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeacherRequest extends FormRequest
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
            'first_name' => ['required', 'min:3', 'max:32'],
            'last_name' => ['required', 'min:3', 'max:32'],
            'phone' => ['nullable', 'digits:11'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'specialization' => ['required', 'min:8'],
            'image' => ['nullable', 'image']
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => 'First Name',
            'last_name' => 'Last Name'
        ];
    }
}
