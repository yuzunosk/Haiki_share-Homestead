<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


use App\Models\Product;
use App\Models\Store;
use App\Models\Category;
use App\Models\Buy;

class userIndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $p = 1, $prefectural = "", $sort = "id", $order = "desc", $expiration = "out")
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
        $sort = (!empty($request->sort)) ? $request->sort : "id";
        $request->session()->put('sort', $sort);

        $sort = $request->session()->get('sort');
        $sortdata = 'products.' . $sort;

        //ソート情報を取得し、セッションに詰める
        $order = (!empty($request->order)) ? $request->order  : "desc";
        $request->session()->put('order', $order);

        $order = $request->session()->get('order');
        $orderdata = $order;

        $prefectural = (!empty($request->prefectural)) ? $request->prefectural : '';
        Log::info("選択されている県：" . $prefectural);

        $expiration = (!empty($request->expiration)) ? $request->expiration : 'out';
        Log::info("期限切れに対する選択：" . $expiration);

        $datetime = new Carbon();
        //現在時刻
        $nowtime  = Carbon::now();


        //変数へといれる
        if (empty($sort)) {
            Log::info('$sortが空の場合');
            //セッション情報がない場合は"id"を詰める
            $sortdata = "products.id";
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
        //県名の指定と期限内の指定があるかどうか判定する。
        //県名指定があり、期限はsafeを希望
        if ($prefectural && $expiration == 'safe') {
            $productDatas = DB::table('products')
                ->leftJoin('stores', 'products.store_id', '=', 'stores.id')
                ->select('products.*') // 必ず指定しよう！
                ->where('stores.prefectural', $prefectural)
                ->where('products.sellby', '>=', $nowtime)
                ->orderBy($sortdata, $orderdata)
                ->offset($currentMinNum)
                ->limit($listSpan)
                ->get();
            //県名指定があり、期限はoutを希望
        } elseif ($prefectural && $expiration == 'out') {

            $productDatas = DB::table('products')
                ->leftJoin('stores', 'products.store_id', '=', 'stores.id')
                ->select('products.*') // 必ず指定しよう！
                ->where('stores.prefectural', $prefectural)
                ->orderBy($sortdata, $orderdata)
                ->offset($currentMinNum)
                ->limit($listSpan)
                ->get();
            //県名指定がなく、期限はsafeを希望
        } elseif (!$prefectural && $expiration == 'safe') {
            $productDatas = DB::table('products')
                ->leftJoin('stores', 'products.store_id', '=', 'stores.id')
                ->select('products.*') // 必ず指定しよう！
                ->where('products.sellby', '>=', $nowtime)
                ->orderBy($sortdata, $orderdata)
                ->offset($currentMinNum)
                ->limit($listSpan)
                ->get();
        } else {
            //県名指定がなく、期限はoutを希望
            $productDatas = DB::table('products')
                ->leftJoin('stores', 'products.store_id', '=', 'stores.id')
                ->select('products.*') // 必ず指定しよう
                ->orderBy($sortdata, $orderdata)
                ->offset($currentMinNum)
                ->limit($listSpan)
                ->get();
        }

        Log::info('取得テスト：' . $productDatas);

        // //データの取得
        // $productDatas = Product::orderBy($sortdata, $orderdata)->offset($currentMinNum)->limit($listSpan)->get();

        Log::info('取得テスト：' . $productDatas);

        //総レコード数取得
        //県名の指定と期限内の指定があるかどうか判定する。
        //県名指定があり、期限はsafeを希望
        if ($prefectural && $expiration == 'safe') {
            $totalRecode = DB::table('products')
                ->leftJoin('stores', 'products.store_id', '=', 'stores.id')
                ->select('products.*') // 必ず指定しよう！
                ->where('stores.prefectural', $prefectural)
                ->where('products.sellby', '>=', $nowtime)
                ->count();
            //県名指定があり、期限はoutを希望
        } elseif ($prefectural && $expiration == 'out') {

            $totalRecode = DB::table('products')
                ->leftJoin('stores', 'products.store_id', '=', 'stores.id')
                ->select('products.*') // 必ず指定しよう！
                ->where('stores.prefectural', $prefectural)
                ->count();
            //県名指定がなく、期限はsafeを希望
        } elseif (!$prefectural && $expiration == 'safe') {
            $totalRecode = DB::table('products')
                ->leftJoin('stores', 'products.store_id', '=', 'stores.id')
                ->select('products.*') // 必ず指定しよう！
                ->where('products.sellby', '>=', $nowtime)
                ->count();
        } else {
            //県名指定がなく、期限はoutを希望
            $totalRecode = DB::table('products')
                ->leftJoin('stores', 'products.store_id', '=', 'stores.id')
                ->select('products.*') // 必ず指定しよう！
                ->count();
        }

        Log::info("総レコード数:" . $totalRecode);

        //総ページ数
        $totalPageNum = ceil($totalRecode / $listSpan);
        Log::info("総ページ数:" . $totalPageNum);

        //カテゴリーデータ取得
        $categorys = Category::all();


        return view('user.index', compact(['productDatas', 'myid', 'buyDatas', 'totalRecode', 'totalPageNum', 'currentPageNum', 'currentMinNum', 'sort', 'order', 'categorys', 'prefectural', 'expiration']));
    }
}
