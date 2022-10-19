<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class GuestRegisterRequest extends FormRequest
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
            'fullName' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/',
            'confirmPassword' => 'required|same:password'
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
            'fullName.required' => 'Please enter your full name',

            'email.required' => 'Please enter your email address',
            'email.email' => 'Wrong email format',
            'email.unique' => 'This email already exists, please enter another email',
            
            'password.required' => 'Please enter your password',
            'password.regex' => 'Password must contain UPPERCASE and lowercase letters, numbers, special characters, and at least 8 characters.',

            'confirmPassword.required' => 'Please enter your password confirmation',
            'confirmPassword.same' => 'Password confirmation is not match',
        ];
    }
}
