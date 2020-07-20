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
    public function __invoke(Request $request, $p = 1)
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('--------購入した商品一覧ページ--------');
        Log::info('」」」」」」」」」」」」」」」」」」');


        //現在ログインしているユーザーのデータを取得する
        $authData   = Auth::user();
        $id          = $authData->id;

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
        $productData = User::find($id)->buy()
            ->join('products', 'buy.buy_product_id', '=', 'products.id')
            ->select('products.*') // 必ず指定しよう！
            ->orderBy('id', 'desc')
            ->offset($currentMinNum)
            ->limit($listSpan)
            ->get();

        Log::info('取得テスト：' . $productData);

        //総レコード数
        $totalRecode =  User::find($id)->buy()
            ->join('products', 'buy.buy_product_id', '=', 'products.id')
            ->select('products.*')
            ->count();

        Log::info("総レコード数:" . $totalRecode);

        //総ページ数
        $totalPageNum = ceil($totalRecode / $listSpan);
        Log::info("総ページ数:" . $totalPageNum);

        Log::info('プロダクトデータ中身:' . $authData);
        Log::info('プロダクトデータ中身:' . $productData);

        return view('user.purchased', compact(['productData', 'authData', 'totalRecode', 'totalPageNum', 'currentPageNum', 'currentMinNum']));
    }
}
