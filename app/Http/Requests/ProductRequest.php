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
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|max:255|string',
            'category'      => 'required|string|filled',
            'price'         => 'min:1|numeric|required|max:99999999|lte:regular_price',
            'regular_price' => 'min:1|numeric|required|max:99999999|gte:price',
            'sellby'        => 'date|required',
            'pic'           => 'file|image|max:10240|nullable|mimes:jpeg,gif,png',
            'store_id'      => 'required'

        ];
    }
    public function messages()
    {
        return [
            'name.required'              => '名前は必須入力です',
            'name.max'                   => '名前は255文字以内で入力して下さい',
            'name.string'                => '名前は文字で入力して下さい',
            'category.required'          => 'カテゴリーは必須入力です',
            'category.string'            => 'カテゴリーは文字で入力して下さい',
            'category.filled'            => 'カテゴリーを選択して下さい',
            'price.required'             => '値段は必須入力です',
            'price.numeric'              => '値段は数値で入力してください',
            'price.min'                  => '値段は1円以上で入力してください',
            'price.max'                  => '値段が高すぎます',
            'price.lte'                  => '値段は通常価格以下にしてください',
            'regular_price.required'     => '値段は必須入力です',
            'regular_price.numeric'      => '値段は数値で入力してください',
            'regular_price.min'          => '値段は1円以上で入力してください',
            'regular_price.max'          => '値段が高すぎます',
            'regular_price.gte'          => '値段はセール価格以上にしてください',
            'sellby.required'            => 'sellbyは必須入力です',
            'sellby.date'                => 'sellbyは日付の形で入力してください',
            'pic.max'                    => '画像サイズが大きすぎます',
            'pic.image'                  => 'ファイル形式が異なっています',
            'pic.file'                   => 'アップロードに失敗しました',
            'pic.mimes'                  => 'ファイルは、jpeg,gif,pngのみ扱う事ができます',
            'store_id'                   => 'ストアIDは必須入力です',
        ];
    }
}
