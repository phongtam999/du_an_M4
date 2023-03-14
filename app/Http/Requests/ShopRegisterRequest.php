<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRegisterRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:4',
            'confirmpassword'=>'required',
            'address'=>'required',
            'phone'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>':attribute không được để trống',
            'email.required'=>':attribute không được để trống',
            'password.required' =>':attribute không được để trống',
            'password.min' =>':attribute phải lớn hơn 4 kí tự',
            'confirmpassword.required'=>':attribute không được để trống',
            'address.required'=>':attribute không được để trống',
            'phone.required'=>':attribute không được để trống',
        ];
    }
}
