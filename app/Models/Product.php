<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $guarded = ['id'];

    public function store()
    {
        //storeに属する
        //storeと多対1の関係性
        return $this->belongsTo('App\Models\Store');
    }
}
