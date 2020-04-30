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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required|maax:255|string',
            'category' => 'required|string',
            'price'    => 'min:0|numeric|required|max:99999999',
            'sellby'   => 'date|required',
            'pic'      => 'image|file|image|max:10240|nullable',
            'store_id' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'name.required'      => '名前は必須入力です',
            'name.max'           => '名前は255文字以内で入力して下さい',
            'name.string'        => '名前は文字で入力して下さい',
            'category.required'  => 'カテゴリーは必須入力です',
            'category.string'    => 'カテゴリーは文字で入力して下さい',
            'price.required'     => '値段は必須入力です',
            'price.numeric'      => '値段は数値で入力してください',
            'price.min'          => '値段は0以上で入力してください',
            'price.max'          => '値段が高すぎます',
            'sellby.required'    => 'sellbyは必須入力です',
            'sellby.date'        => 'sellbyは日付の形で入力してください',
            'pic.max'            => '画像サイズが大きすぎます',
            'pic.image'          => 'ファイル形式が異なっています',
            'pic.file'           => 'アップロードに失敗しました',
            'store_id'           => 'ストアIDは必須入力です',
        ];
    }
}
