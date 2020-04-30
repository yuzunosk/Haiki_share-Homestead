<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


use App\Http\Requests\ProductRequest;

use App\models\Product;


class ProductController extends Controller
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
    public function create(ProductRequest $request)
    {
        //一つずつ入れた方が後の変更に対応しやすい
        $product = new Product;

        //ファイル・リサイズを行う
        //リクエストにファイルデータがある場合
        if ($request->file('pic')) {
            Log::info('ファイル名:' . $request->file('pic'));

            $file = $request->file('pic');

            //アップロードされるファイル名を取得
            $filename = $file->getClientOriginalName();

            //storeAs以降パス,保存名,使用するルート
            $product->pic = $request->file('pic')->storeAs('images', $filename, ['disk' => 'public']);
        } else {
            $product->pic = null;
        }
        $product->name         = $request->name;
        $product->category     = $request->category;
        $product->price        = $request->price;
        $product->sellby       = $request->sellby;
        $product->store_id     = $request->store_id;

        $product->save();

        //リダイレクトする、その際にフラッシュメッセージを入れておく
        return redirect('/store/product/index')->with('flash_message', __('Registered'));
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
        return view('product.new');
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
