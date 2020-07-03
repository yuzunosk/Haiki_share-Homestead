<?php

namespace App\Http\Controllers\User;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ProductPurchasedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('--------購入した商品一覧ページ--------');
        Log::info('」」」」」」」」」」」」」」」」」」');


        //現在ログインしているユーザーのデータを取得する
        $userData   = Auth::user();
        $id          = $userData->id;
        //$idを使って、storeデータの中の$idが登録しているデータ取得
        $productData = User::find($id)->buy()->join('products', 'buy.buy_product_id', '=', 'products.id')->get();

        Log::info('プロダクトデータ中身:' . $userData);
        Log::info('プロダクトデータ中身:' . $productData);

        return view('user.purchased', compact(['productData', 'userData']));
    }
}
