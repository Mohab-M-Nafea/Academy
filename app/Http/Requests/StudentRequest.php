<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
            'username' => ['required', 'min:8', 'max:32'],
            'phone' => ['nullable', 'digits:11'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'specialization' => ['nullable', 'min:8'],
            'image' => ['nullable', 'image'],
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'confirm_password' => 'Confirm Password',
        ];
    }
}
