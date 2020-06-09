<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



use App\Http\Requests\ProductRequest;

use App\models\Product;
use App\models\Store;
use App\models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $p = 1, $sort = "id", $order = "desc")
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('--------一覧表示ページ----------');
        Log::info('」」」」」」」」」」」」」」」」」」');

        Log::info("p=" . $p);
        // 現在のページ情報を取得
        $currentPageNum = (!empty($p)) ? (int) $p : "1";
        Log::info("現在のページ情報:" . $currentPageNum);

        // if (!is_int((int) $currentPageNum)) {
        //     // ただしいIDかどうか判定
        //     if (!ctype_digit($id)) {
        //         return redirect()->route('store.product.index')->with('flash_message', __('Invalid operation was performed.'));
        //     }
        // }
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


        return view('product.index', compact(['productDatas', 'totalRecode', 'totalPageNum', 'currentPageNum', 'currentMinNum', 'sort', 'order', 'categorys']));
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

        $product->name         = $request->name;
        $product->category     = $request->category;
        $product->price        = $request->price;
        $product->sellby       = $request->sellby;
        $product->store_id     = $request->store_id;

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
        Log::info('プロダクトデータ中身:' . $productData);
        Log::info('ストアデータ中身:' . $storeData);

        return view('product.show', compact(['productData', 'storeData']));
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
        $categorys = Category::all();
        return view('product.new', compact('categorys'));
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

        //idを元にDBからproductデータを検出し、変数へ収納
        $productData = Product::find($id);
        // Log::info('プロダクトデータ:' . $productData);
        //productディレクトリのnewファイルを読み込む
        $categorys = Category::all();
        // Log::info('カテゴリーデータ:' . $categorys);


        return view('product.edit', compact(['productData', 'categorys']));
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
            $product->pic = null;
        }

        $product->name         = $request->name;
        $product->category     = $request->category;
        $product->price        = $request->price;
        $product->sellby       = $request->sellby;
        $product->store_id     = $request->store_id;

        $product->save();
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
        //検索に合う
        Product::find($id)->delete();
        return redirect()->route('store.product.index')->with('flash_message', __('Deleted'));
    }
}
