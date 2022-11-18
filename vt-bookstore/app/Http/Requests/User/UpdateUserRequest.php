<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'fullName' => 'required|max: 255',
            'dob' => 'required|date',
            'image' => 'nullable|mimes:jpg,jpeg,png',
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
            'fullName.max' => 'Your full name cannot exceed 255 characters',
            
            'dob.required' => 'Please enter your date of birth',
            'dob.date' => 'Wrong date format',

            'image.mimes' => 'Your image file extension must be .jpg, .jpeg or .png',
        ];
    }
}
