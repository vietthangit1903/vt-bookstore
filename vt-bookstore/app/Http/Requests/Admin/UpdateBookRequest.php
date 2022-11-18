<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'id'=>'required',
            'category_id'=>'required',
            'author_id'=>'required',
            'name' => 'required|max: 255',
            'description' => 'required',
            'price' => 'required|regex:/^\d*\.?\d*$/',
            'stock' => 'required|integer|gte:0',
            'publisher_id' => 'required',
            'publishDate' => 'required|date',
            'image'=>'nullable',
            'image.*' => 'mimes:jpg,jpeg,png',
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
            'name.required' => 'Please enter book\'s name',
            'name.max' => 'Book\'s name can not exceed 255 characters',

            'description.required' => 'Please enter book\'s description',

            'price.required' => 'Please enter book price',
            'price.regex' => 'Incorrect concurency format',

            'stock.required' => 'Please enter the number of book',
            'stock.integer' => 'Number of book must be integer',
            'stock.gte' => 'The number of books cannot be negative',

            'publishDate.required' => 'Please enter the published date',
            'publishDate.date' => 'Wrong date format',

            'image.*.mimes' => 'Your image file extension must be .jpg, .jpeg or .png'

        ];
    }
}
