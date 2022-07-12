<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdataRequest extends FormRequest
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
            'name'=>['required', 'unique:product,name,'].$this->id,
            'price'=>['required','max:10'],
            'introduce'=>['required'],
            'src'=>['required'],
            // 'src'=>['required','src'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Enter your name.',
            'name.unique'=>'Ten da ton tai',
            'price.required'=>'Enter your price.',
            'price.max'=>'Value is 10 compared.',
            'introduce.required'=>'Enter your introduce.',
            'src.required'=>'Enter your src.',
            // 'src.src'=>'Day khong phải la hinh anh',
        ];
    }
}
