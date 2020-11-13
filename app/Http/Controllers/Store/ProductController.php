<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


use App\Http\Requests\ProductRequest;
use Carbon\Carbon;


use App\Models\Product;
use App\Models\Store;
use App\Models\Category;
use App\Models\Buy;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $p = 1, $prefectural = "", $sort = "id", $order = "desc", $expiration = "out")
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('--------ストアー商品一覧編集ページ----------');
        Log::info('」」」」」」」」」」」」」」」」」」');

        //ストアデータを取得
        $storeData = Auth::user();
        Log::info("ログインストアデータ" . $storeData);

        //ログインストアIDを取得
        $storeId = Auth::id();
        Log::info("ログインストアID" . $storeId);

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

        //オーダー情報を取得し、セッションに詰める
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
                ->where('stores.id', $storeId)
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
                ->where('stores.id', $storeId)
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
                ->where('stores.id', $storeId)
                ->where('products.sellby', '>=', $nowtime)
                ->orderBy($sortdata, $orderdata)
                ->offset($currentMinNum)
                ->limit($listSpan)
                ->get();
        } else {
            //県名指定がなく、期限はoutを希望
            $productDatas = DB::table('products')
                ->leftJoin('stores', 'products.store_id', '=', 'stores.id')
                ->select('products.*') // 必ず指定しよう！
                ->where('stores.id', $storeId)
                ->orderBy($sortdata, $orderdata)
                ->offset($currentMinNum)
                ->limit($listSpan)
                ->get();
        }

        Log::info('取得テスト：' . $productDatas);

        //総レコード数取得
        //県名の指定と期限内の指定があるかどうか判定する。
        //県名指定があり、期限はsafeを希望
        if ($prefectural && $expiration == 'safe') {
            $totalRecode = DB::table('products')
                ->leftJoin('stores', 'products.store_id', '=', 'stores.id')
                ->select('products.*') // 必ず指定しよう！
                ->where('stores.id', $storeId)
                ->where('stores.prefectural', $prefectural)
                ->where('products.sellby', '>=', $nowtime)
                ->count();
            //県名指定があり、期限はoutを希望
        } elseif ($prefectural && $expiration == 'out') {

            $totalRecode = DB::table('products')
                ->leftJoin('stores', 'products.store_id', '=', 'stores.id')
                ->select('products.*') // 必ず指定しよう！
                ->where('stores.id', $storeId)
                ->where('stores.prefectural', $prefectural)
                ->count();
            //県名指定がなく、期限はsafeを希望
        } elseif (!$prefectural && $expiration == 'safe') {
            $totalRecode = DB::table('products')
                ->leftJoin('stores', 'products.store_id', '=', 'stores.id')
                ->select('products.*') // 必ず指定しよう！
                ->where('stores.id', $storeId)
                ->where('products.sellby', '>=', $nowtime)
                ->count();
        } else {
            //県名指定がなく、期限はoutを希望
            $totalRecode = DB::table('products')
                ->leftJoin('stores', 'products.store_id', '=', 'stores.id')
                ->select('products.*') // 必ず指定しよう！
                ->where('stores.id', $storeId)
                ->count();
        }

        Log::info("総レコード数:" . $totalRecode);


        //総ページ数
        $totalPageNum = ceil($totalRecode / $listSpan);
        Log::info("総ページ数:" . $totalPageNum);

        //カテゴリーデータ取得
        $categorys = Category::all();


        return view('product.index', compact(['storeData', 'productDatas', 'storeId', 'buyDatas', 'totalRecode', 'totalPageNum', 'currentPageNum', 'currentMinNum', 'sort', 'order', 'categorys', 'prefectural', 'expiration']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProductRequest $request)
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('---------登録処理開始-----------');
        Log::info('」」」」」」」」」」」」」」」」」」');


        //ファイルデータが確認したい時にコメントアウト
        // dd($request->file('pic'));

        //一つずつ入れた方が後の変更に対応しやすい
        $product = new Product;

        //ファイル・リサイズを行う
        //リクエストにファイルデータがある場合
        if ($request->pic) {
            Log::info('ファイル名:' . $request->pic);

            $tmppath = $_FILES['pic']['tmp_name'];

            //アップロードされるファイル名を取得
            $filename = hash_file('sha1', $tmppath);

            //storeAs以降パス,保存名,使用するルート
            $product->pic = $request->pic->storeAs('images', $filename, ['disk' => 'public']);
        } else {
            //ファイルがなかった場合nullをいれる
            $product->pic = null;
        }

        $product->name          = $request->name;
        $product->category      = $request->category;
        $product->price         = $request->price;
        $product->regular_price = $request->regular_price;
        $product->sellby        = $request->sellby;
        $product->store_id      = $request->store_id;

        $product->save();
        Log::info('保存する中身の確認：' . $product);

        //リダイレクトする、その際にフラッシュメッセージを入れておく
        return redirect('/store/home')->with('flash_message', __('Registered'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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


        return view('product.show', compact(['productData', 'storeData', 'buyData']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('--------新規登録ページ----------');
        Log::info('」」」」」」」」」」」」」」」」」」');
        //productディレクトリのnewファイルを読み込む

        //ストアデータを取得
        $storeData = Auth::user();
        Log::info("ログインストアデータ" . $storeData);

        $categorys = Category::all();
        return view('product.new', compact('storeData', 'categorys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('----------更新ページ------------');
        Log::info('」」」」」」」」」」」」」」」」」」');

        $storeData = Auth::user();

        //idを元にDBからproductデータを検出し、変数へ収納
        $productData = Product::find($id);
        // Log::info('プロダクトデータ:' . $productData);
        //productディレクトリのnewファイルを読み込む
        $categorys = Category::all();
        // Log::info('カテゴリーデータ:' . $categorys);


        return view('product.edit', compact(['storeData', 'productData', 'categorys']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('-----プロダクト更新処理開始-------');
        Log::info('」」」」」」」」」」」」」」」」」」');
        // GETパラメータが数字かどうかをチェックする
        //事前にチェックする事で無駄なアクセスを減らせる
        if (!ctype_digit($id)) {
            return redirect()->route('store.product.index')->with('flash_message', __('Invalid operation was performed.'));
        }


        //ファイルデータが確認したい時にコメントアウト
        // dd($request->file('pic'));

        //idを元にデータを探してきて、変数へ収納する
        $product = Product::find($id);

        //ファイル・リサイズを行う
        //リクエストにファイルデータがある場合
        if ($request->pic) {
            Log::info('ファイル名:' . $request->pic);

            $tmppath = $_FILES['pic']['tmp_name'];

            //アップロードされるファイル名を取得
            $filename = hash_file('sha1', $tmppath);

            //storeAs以降パス,保存名,使用するルート
            $product->pic = $request->pic->storeAs('images', $filename, ['disk' => 'public']);
        } else {
            //ファイルがなかった場合nullをいれる
            Log::info('リクエストにありません');
        }

        $product->name          = $request->name;
        $product->category      = $request->category;
        $product->price         = $request->price;
        $product->regular_price = $request->regular_price;
        $product->sellby        = $request->sellby;
        $product->store_id      = $request->store_id;

        $product->update();
        Log::info('保存する中身の確認：' . $product);

        //リダイレクトする、その際にフラッシュメッセージを入れておく
        return redirect()->route('store.product.index')->with('flash_message', __('Updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('--------商品削除ページ--------');
        Log::info('」」」」」」」」」」」」」」」」」」');
        //検索に合う
        Product::find($id)->delete();
        Log::info('商品削除 実行しました');
        return redirect()->route('store.product.index')->with('flash_message', __('Deleted'));
    }
}
