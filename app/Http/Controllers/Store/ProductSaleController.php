<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use App\Models\Store;
use Illuminate\Support\Facades\Log;

class ProductSaleController extends Controller
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
        Log::info('--------売却商品一覧ページ--------');
        Log::info('」」」」」」」」」」」」」」」」」」');


        //現在ログインしているストアのデータを取得する
        $storeData   = Auth::user();
        $id          = $storeData->id;
        //$idを使って、storeデータの中の$idが登録しているデータ取得
        //$idをもつ、購入データをbuyから探しだし、buy_product_idとproducts.idが同値のテーブルを連結
        $saleData        = Store::find($id)->buy()->join('products', 'buy.buy_product_id', '=', 'products.id')->get();

        Log::info('プロダクトデータ中身:' . $storeData);
        Log::info('プロダクトデータ中身:' . $saleData);

        return view('product.sale', compact(['saleData', 'storeData']));
    }
}
