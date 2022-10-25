<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'currentPassword' => 'required|current_password',
            'newPassword' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/',
            'confirmNewPassword' => 'required|same:newPassword'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [

            'currentPassword.required' => 'Please enter your current password',
            'currentPassword.current_password' => 'Your current password is incorrect',

            'newPassword.required' => 'Please enter your new password',
            'newPassword.regex' => 'Password must contain UPPERCASE and lowercase letters, numbers, special characters, and at least 8 characters.',

            'confirmNewPassword.required' => 'Please enter your new password confirmation',
            'confirmNewPassword.same' => 'Password confirmation is not match',

        ];
    }
}
