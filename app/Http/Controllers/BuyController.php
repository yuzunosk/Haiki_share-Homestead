<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendPurchaseMail;


use App\models\Store;
use App\models\User;



use App\models\Buy;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('---------購入処理開始-----------');
        Log::info('」」」」」」」」」」」」」」」」」」');

        // 新しいBuyインスタンス作成
        $buyData = new Buy;

        // POSTデータを変数へ収納
        $p_id = $request->p_id;
        Log::info('取得プロダクトID:' . $p_id);
        $buyer_id = $request->s_id;
        Log::info('取得ユーザーID:' . $buyer_id);

        //ログインユーザー情報&ストアー情報取得
        $userData  = Store::find($request->u_id);
        $storeData = Store::find($request->s_id);
        Log::info('取得ユーザー情報:' . $userData);
        Log::info('取得ストアー情報:' . $storeData);



        // レコードがあるかどうか判定
        $res = Buy::where("buy_product_id", $p_id)->count();
        Log::info($res);

        // 判定結果が0ではない場合
        if (empty($res)) {
            // 取得データを保存する
            $buyData->buy_product_id    = $p_id;
            $buyData->buy_user_id       = $buyer_id;

            $buyData->save();
            Log::info("保存したデータの中身：" . $buyData);

            $to = [
                [
                    'email' => $userData->email,
                    'name' => $userData->name,
                ],
                [
                    'email' => $storeData->email,
                    'name' => $storeData->name,
                ],
            ];

            Mail::to($to)->send(new sendPurchaseMail($to));
        } else {
            Buy::where("buy_product_id", $p_id)->delete();
            Log::info("購入データを削除しました");
        }


        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
