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
    public function __invoke(Request $request)
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('--------出品商品一覧ページ--------');
        Log::info('」」」」」」」」」」」」」」」」」」');


        //現在ログインしているストアのデータを取得する
        $storeData   = Auth::user();
        $id          = $storeData->id;
        //$idを使って、storeデータの中の$idが登録しているデータ取得
        $productData = Store::find($id)->products()->get();

        Log::info('プロダクトデータ中身:' . $storeData);
        Log::info('プロダクトデータ中身:' . $productData);

        return view('product.exhibition', compact(['productData', 'storeData']));
    }
}
