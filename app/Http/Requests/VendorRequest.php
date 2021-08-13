<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            'name' => 'required|max:100|string',
            'email' => 'required|email|max:100|unique:vendors,email',
            'phone' => 'required|max:20|unique:vendors,phone',
            'logo' => 'required|mimes:jpg,png,jpeg',
            'catigory_id' => 'required|exists:main_categories,id',
            'address' => 'required',
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'max' => 'البيانات المخله كبيرة للغاية',
            'string' => 'هذا الحقل يجب ان يحتوي علي حروف فقط',
            'email' => 'صيغة الادخل غير صالحة',
            'exists' => 'يجب ان تختار عنصر متاح'
        ];
    }
}
