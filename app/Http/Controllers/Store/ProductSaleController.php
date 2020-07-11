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
    public function __invoke(Request $request, $p = 1)
    {

        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('--------売却商品一覧ページ--------');
        Log::info('」」」」」」」」」」」」」」」」」」');


        //現在ログインしているストアのデータを取得する
        $storeData   = Auth::user();
        $storeId          = $storeData->id;

        Log::info("p=" . $p);
        // 現在のページ情報を取得
        $currentPageNum = (!empty($p)) ? (int) $p : "1";
        Log::info("現在のページ情報:" . $currentPageNum);


        // 表示件数
        $listSpan = 8;
        //現在の表示レコードの先頭
        $currentMinNum = ($currentPageNum - 1) * $listSpan;
        Log::info($currentMinNum . "個目からデータを取得する");


        //データの取得
        $productDatas = Store::find($storeId)->products()->orderBy('id', 'desc')->offset($currentMinNum)->limit($listSpan)->get();
        Log::info('取得テスト：' . $productDatas);

        //総レコード数
        $totalRecode =  Store::find($storeId)->buy()->join('products', 'buy.buy_product_id', '=', 'products.id')->count();
        Log::info("総レコード数:" . $totalRecode);

        //総ページ数
        $totalPageNum = ceil($totalRecode / $listSpan);
        Log::info("総ページ数:" . $totalPageNum);


        //$idを使って、storeデータの中の$idが登録しているデータ取得
        //$idをもつ、購入データをbuyから探しだし、buy_product_idとproducts.idが同値のテーブルを連結
        $saleData = Store::find($storeId)->buy()->offset($currentMinNum)->limit($listSpan)->join('products', 'buy.buy_product_id', '=', 'products.id')->get();



        Log::info('プロダクトデータ中身:' . $storeData);
        Log::info('プロダクトデータ中身:' . $saleData);

        return view('product.sale', compact(['saleData', 'storeId', 'totalRecode', 'totalPageNum', 'currentPageNum', 'currentMinNum']));
    }
}
