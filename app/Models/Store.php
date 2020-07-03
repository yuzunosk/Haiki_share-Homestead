<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Store extends Authenticatable
{
    protected $table = 'stores';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'branch_name', 'email', 'password', 'address', 'zip', 'prefectural',
        'tel', 'manager_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products()
    {
        //productとの1対多のリレーション
        //いくつものpuroductを持っている
        return $this->hasMany('App\Models\Product');
    }


    public function buy()
    {
        //buyデータとの1対1のリレーション
        //フォーリンキー名はカスタムしてるので、第二引数に指定する
        return $this->hasOne('App\Models\Buy', 'buy_user_id');
    }
}
