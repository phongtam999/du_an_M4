<?php

namespace App\Http\Requests;

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
            'name'=>'required|min:4',
            'price'=>'required',
            'quantity'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'folow'=>'required',
            'image'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => ':attribute không được để trống',
            'name.min' => ':attribute bắt buộc lớn hơn :min kí tự',
            'price.required' => ':attribute không được để trống',
            'quantity.required' => ':attribute không được để trống',
            'description.required' => ':attribute không được để trống',
            'category_id.required' => 'Bắt buộc chọn :attribute',
            'folow.required' => ':attribute không được để trống' ,
            'image.required' => ':attribute không được để trống',

        ];

    }
}
