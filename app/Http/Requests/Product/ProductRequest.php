<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>['required', 'unique:products'],
            'price'=>['required','max:10'],
            'introduce'=>['required'],
            'content'=>['required'],
            'src'=>['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Enter your name.',
            'name.unique'=>'The name has existed',
            'price.required'=>'Enter your price.',
            'price.max'=>'Value is 10 compared.',
            'introduce.required'=>'Enter your introduce.',
            'content.required'=>'Enter your content.',
            'src.required'=>'This is not a picture.',
            // 'src.src'=>'This is not a picture.',
        ];
    }
}
