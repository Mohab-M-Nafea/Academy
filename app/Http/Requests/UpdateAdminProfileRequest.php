<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;

class UpdateAdminProfileRequest extends AdminRequest
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
        return array_merge(Parent::rules(), [
            'email' => ['required', 'email', 'unique:admins,email,' . auth('admins')->user()->id],
            'password' => [
                Password::sometimes(),
                'nullable',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            'confirm_password' => ['sometimes', 'same:password'],
        ]);
    }
}
