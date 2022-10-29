<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'addressName' => 'required|max: 255',
            'addressDetail' => 'required|max: 255',
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

            'addressName.required' =>   'Please enter your address name',
            'addressName.max' => 'Your address name length must not exceed 255 words',
            'addressDetail.required' => 'Please enter your address detail',
            'addressDetail.max' => 'Your address detail must not exceed 255 words',
        ];
    }
}
