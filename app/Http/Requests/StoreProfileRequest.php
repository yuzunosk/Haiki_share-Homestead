<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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

            'name'               => 'required|max:255|string',
            'branch_name'        => 'required|max:255|string',
            'email'              => 'required|max:255|string',
            'address'            => 'max:255|string|nullable',
            'password'           => 'required|max:20|string',
        ];
    }
    public function messages()
    {
        return [
            'name.required'        => '店舗名は必須入力です',
            'name.max'             => '店舗名は255文字以内で入力して下さい',
            'name.string'          => '店舗名は文字で入力して下さい',
            'branch_name.required' => '支店名は必須入力です',
            'branch_name.max'      => '支店名は255文字以内で入力して下さい',
            'branch_name.string'   => '支店名は文字で入力して下さい',
            'email.required'       => 'emailは必須入力です',
            'email.max'            => 'emailは255文字以内で入力して下さい',
            'email.string'         => 'emailは文字で入力して下さい',
            'address.max'          => '住所は255文字以内で入力して下さい',
            'address.string'       => '住所は文字で入力して下さい',
            'password.required'    => 'パスワードは必須入力です',
            'password.max'         => 'パスワードは20文字以内で入力して下さい',
            'password.string'      => 'パスワードは文字で入力して下さい',
        ];
    }
}
