<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


use App\models\Product;
use App\models\Store;
use App\models\Category;
use App\models\Buy;

class userIndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $p = 1, $sort = "id", $order = "desc")
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('--------ユーザー全商品一覧ページ----------');
        Log::info('」」」」」」」」」」」」」」」」」」');

        //ログインユーザーIDを取得
        $myid = Auth::user();
        Log::info("ログインストアID" . $myid);

        //buyDataを取得
        $buyDatas = Buy::all();
        Log::info("購入データ:" . $buyDatas);


        Log::info("p=" . $p);
        // 現在のページ情報を取得
        $currentPageNum = (!empty($p)) ? (int) $p : "1";
        Log::info("現在のページ情報:" . $currentPageNum);

        // 表示件数
        $listSpan = 12;
        //現在の表示レコードの先頭
        $currentMinNum = ($currentPageNum - 1) * $listSpan;
        Log::info("currentMinNumの中身:" . $currentMinNum);

        // requestされているか確認
        Log::info("ソートの中身チェック:" . $request->sort);
        Log::info("オーダーの中身チェック:" . $request->order);

        //空の変数を設定
        $sortdata = "";
        $orderdata = "";

        //ソート情報を取得し、セッションに詰める
        $sort = (!empty($request->sort)) ? $request->sort : "";
        $request->session()->put('sort', $sort);

        $sort = $request->session()->get('sort');
        $sortdata = $sort;

        //ソート情報を取得し、セッションに詰める
        $order = (!empty($request->order)) ? $request->order  : "";
        $request->session()->put('order', $order);

        $order = $request->session()->get('order');
        $orderdata = $order;


        //変数へといれる
        if (empty($sort)) {
            Log::info('$sortが空の場合');
            //セッション情報がない場合は"id"を詰める
            $sortdata = "id";
        }

        //変数へといれる
        if (empty($order)) {
            Log::info('$orderが空の場合');
            //セッション情報がない場合は"desc"を詰める
            $orderdata = "desc";
        }

        Log::info('$sortの中身:' . $sort);
        Log::info('$orderの中身:' . $order);


        //データの取得
        $productDatas = Product::orderBy($sortdata, $orderdata)->offset($currentMinNum)->limit($listSpan)->get();

        Log::info('取得テスト：' . $productDatas);

        //総レコード数
        $totalRecode = Product::all()->count();
        Log::info("総レコード数:" . $totalRecode);

        //総ページ数
        $totalPageNum = ceil($totalRecode / $listSpan);
        Log::info("総ページ数:" . $totalPageNum);

        //カテゴリーデータ取得
        $categorys = Category::all();


        return view('user.index', compact(['productDatas', 'myid', 'buyDatas', 'totalRecode', 'totalPageNum', 'currentPageNum', 'currentMinNum', 'sort', 'order', 'categorys']));
    }
}
