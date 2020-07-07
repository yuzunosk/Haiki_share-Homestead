<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use App\Models\Store;
use Illuminate\Support\Facades\Log;


class ProductExhibitionController extends Controller
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
        Log::info('--------出品商品一覧ページ--------');
        Log::info('」」」」」」」」」」」」」」」」」」');


        //現在ログインしているストアのデータを取得する
        $storeData   = Auth::User();
        $storeId    = $storeData->id;
        //$idを使って、storeデータの中の$idが登録しているデータ取得

        Log::info("p=" . $p);
        // 現在のページ情報を取得
        $currentPageNum = (!empty($p)) ? (int) $p : "1";
        Log::info("現在のページ情報:" . $currentPageNum);

        // 表示件数
        $listSpan = 5;
        //現在の表示レコードの先頭
        $currentMinNum = ($currentPageNum - 1) * $listSpan;
        Log::info($currentMinNum . "個目からデータを取得する");


        //データの取得
        $productDatas = Store::find($storeId)->products()->orderBy('id', 'desc')->offset($currentMinNum)->limit($listSpan)->get();
        Log::info('取得テスト：' . $productDatas);

        //総レコード数
        $totalRecode =  Store::find($storeId)->products()->count();
        Log::info("総レコード数:" . $totalRecode);

        //総ページ数
        $totalPageNum = ceil($totalRecode / $listSpan);
        Log::info("総ページ数:" . $totalPageNum);


        Log::info('ストアデータ:' . $storeData);
        Log::info('プロダクトデータ:' . $productDatas);

        return view('product.exhibition', compact(['productDatas', 'storeId', 'totalRecode', 'totalPageNum', 'currentPageNum', 'currentMinNum']));
    }
}
