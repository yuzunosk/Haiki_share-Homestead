<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


use App\Http\Requests\ProductRequest;

use App\Models\Product;
use App\Models\Store;
use App\Models\Category;
use App\Models\Buy;

class userProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('---------商品詳細ページ----------');
        Log::info('」」」」」」」」」」」」」」」」」」');

        // ただしいIDかどうか判定
        if (!ctype_digit($id)) {
            return redirect()->route('store.product.index')->with('flash_message', __('Invalid operation was performed.'));
        }

        //idからプロダクト情報を取得し、変数へと収納する
        //リレーションを使ってstore_idを取得し、DBからストアデータを取得する
        $productData  = Product::find($id);
        $storeData    = Store::find($productData->store_id);
        $res          = Buy::where("buy_product_id", $id)->first();

        if (empty($res)) {
            $buyData = "null";
        } else {
            $buyData = $res;
        }

        Log::info('プロダクトデータ中身:' . $productData);
        Log::info('ストアデータ中身:' . $storeData);
        Log::info('購入データ中身:' . $buyData);


        return view('product.usershow', compact(['productData', 'storeData', 'buyData']));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
