<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Hankaku;
use App\Rules\AlphaNumHalf;


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

            'store_name'         => 'required|max:255|string',
            'branch_name'        => 'required|max:255|string',
            'email'              => 'required|max:255|string|email',
            'address'            => 'max:255|string|nullable',
            'password'           => 'required|max:20|string|min:6',
        ];
    }
    public function messages()
    {
        return [
            'store_name.required'  => '店舗名は必須入力です',
            'store_name.max'       => '店舗名は255文字以内で入力して下さい',
            'store_name.string'    => '店舗名は文字で入力して下さい',
            'branch_name.required' => '支店名は必須入力です',
            'branch_name.max'      => '支店名は255文字以内で入力して下さい',
            'branch_name.string'   => '支店名は文字で入力して下さい',
            'email.required'       => 'emailは必須入力です',
            'email.max'            => 'emailは255文字以内で入力して下さい',
            'email.string'         => 'emailは文字で入力して下さい',
            'email.email'          => 'emailの形式で入力して下さい',
            'address.max'          => '住所は255文字以内で入力して下さい',
            'address.string'       => '住所は文字で入力して下さい',
            'password.required'    => 'パスワードは必須入力です',
            'password.max'         => 'パスワードは20文字以内で入力して下さい',
            'password.min'         => 'パスワードは6文字以上で入力して下さい',
            'password.string'      => 'パスワードは文字で入力して下さい',
        ];
    }
}
