<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addLanguagesRequest extends FormRequest
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
            'name' =>'required|string|max:100',
            'locale' =>'required|string|max:20',
            'abbr' =>'required|max:10',
            'direction' => 'required|in:rtl,ltr',
            // 'active' =>'required|in:0,1',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب اضافة الاسم',
            'locale.required' => 'يجب اضافة اللوكل',
            'abbr.required' => 'يجب اضافة الاختصار',
            'direction.required' => 'يجب اضافة الاتجاه',
            // 'active.required' => 'يجب اضافة الحالة',
            // 'name.unique' => 'الاسم متكرر',
            'direction.in' => 'القيمة المخلة غير صحيحة',
            'active.in' => 'القيمة المخلة غير صحيحة',
            'name.string' => 'الاسم يجب ان يحتوي علي احرف وليس ارقام',
            'locale.string' => 'اللوكل يجب ان يحتوي علي احرف وليس ارقام',
            'name.max' => 'الاسم كبير للغاية',
            'locale.max' => 'اللوكل كبير للغاية',
            'abbr.max' => 'الاختصار كبير للغاية',

        ];
    }
}
