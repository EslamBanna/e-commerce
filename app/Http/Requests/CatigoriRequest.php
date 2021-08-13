<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatigoriRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            // 'name'=>'required|unique:main_categories|max:150',
            'photo' => 'required', //|mimes:jpg,jpeg,png
            'category' =>'required|array|min:1',
            'category.*.slug' =>'required|max:150',
            'category.*.name' =>'required|unique:main_categories|max:150',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'unique' => 'هذا القسم موجود بالفعل',
            'max'=> 'البيانات المدخلة طويلة عن الازم',
        ];
    }
}
