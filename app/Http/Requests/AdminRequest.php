<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'title' => 'required | regex:/^[\pL\pM\s]+$/u',
            'description' => 'required | min:10 | max:255',
            'quantity' => 'required | numeric ',
            'price' => 'required | numeric',
            'category' => 'required | regex:/^[\pL\pM\s]+$/u',
            'dis_price' => 'required | numeric',
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'required' =>'Không được bỏ trống',
            'regex' =>'Không được nhập số',
            'min' => 'Không được nhỏ hơn 10 ký tự',
            'max' => 'Không được nhập quá 255 ký tự',
            'numeric' => 'Không được nhập chữ',
            'image' => 'Ảnh không hợp lệ',
        ];
    }
}
