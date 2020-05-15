<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



use App\Http\Requests\ProductRequest;

use App\models\Product;
use App\models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //requestされているか確認
        Log::info($request->sort);
        Log::info($request->order);

        //ソート情報を取得し、セッションに詰める
        if (!empty($request->sort)) {
            //セッション内に詰め込む
            Session::put('sort', $request->sort);
        } else {
            //空の場合nullをいれる
            Session::put('sort', null);
        }
        //変数へといれる
        $sort = Session::get('sort', array());
        Log::info('session[sort]の中身:' . Session::get('sort'));
        //オーダー情報を取得し、セッションに詰める
        if (!empty($request->order)) {
            Session::put('order', $request->order);
        } else {
            Session::put('order', null);
        }
        $order = Session::get('order', array());

        $sessionData = Session::all();
        Log::info('session[order]の中身:' . session('order'));



        //Session['sort']がnullではない場合
        if (!is_null($sort)) {
            if (!is_null($order)) {
                //Session['order']がnullではない場合
                //情報を取得し、並び替える
                $products = Product::orderBy($sort, $order)->paginate(6);
            } else {
                //ソート情報のみを反映させる、並びは降順
                $products = Product::orderBy($sort, 'desc')->paginate(6);
            }
        } else {
            //Session['sort']がnullの場合
            if (!is_null($order)) {
                //Session['order']がnullではない場合
                //情報を取得し、並び替える
                //ソート情報がないので、id順に降順で並べる
                $products = Product::orderBy('id', $order)->paginate(6);
            } else {
                //ソート情報もなく、オーダー情報もない場合降順で並べる
                $products = Product::orderBy('id', 'desc')->paginate(6);
            }
        }
        //ORMを使いproductデータを取得し、変数に収納する
        // Log::info('プロダクトデータ:' . $products);

        return view('product.index', compact('products'));
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
        return redirect()->route('store.product.index')->with('flash_message', __('Registered'));
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
    public function new()
    {
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
        //idを元にDBからproductデータを検出し、変数へ収納
        $productData = Product::find($id);
        Log::info('プロダクトデータ:' . $productData);
        //productディレクトリのnewファイルを読み込む
        $categorys = Category::all();
        Log::info('カテゴリーデータ:' . $categorys);


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
        // GETパラメータが数字かどうかをチェックする
        //事前にチェックする事で無駄なアクセスを減らせる
        if (!ctype_digit($id)) {
            return redirect('/chanpions')->with('flash_message', __('Invalid operation was performed.'));
        }

        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('---------更新処理開始-----------');
        Log::info('」」」」」」」」」」」」」」」」」」');

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
