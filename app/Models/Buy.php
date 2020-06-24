<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $table = 'buy';

    protected $guarded = ['id'];


    public function store()
    {
        //buyデータとの1対1のリレーション
        //フォーリンキー名はカスタムしてるので、第二引数に指定する
        return $this->hasOne('App\Models\Store');
    }

    public function product()
    {
        //buyデータとの1対1のリレーション
        //フォーリンキー名はカスタムしてるので、第二引数に指定する
        return $this->hasOne('App\Models\Product');
    }
}
