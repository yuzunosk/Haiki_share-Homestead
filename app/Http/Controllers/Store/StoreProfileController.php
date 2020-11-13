<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Store;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreProfileRequest;



class StoreProfileController extends Controller
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
        //
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
        Log::info('「「「「「「「「「「「「「「「「「「「「');
        Log::info('------ストアプロフィール編集--------');
        Log::info('」」」」」」」」」」」」」」」」」」」」');

        //idかどうか判定
        if (!ctype_digit($id)) {
            return redirect('/store/home')->with('flash_message', __('Invalid operation was performed'));
        }

        $storeData = Store::find($id);
        Log::info('取得したデータ：' . $storeData);


        return view('store.prof_edit', compact('storeData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProfileRequest $request, $id)
    {
        Log::info('「「「「「「「「「「「「「「「「「「「「');
        Log::info('----ストアプロフィール更新処理開始----');
        Log::info('」」」」」」」」」」」」」」」」」」」」');
        //idかどうか判定
        if (!ctype_digit($id)) {
            Log::info('正しいidではありません');
            return redirect('/store/home')->with('flash_message', __('Invalid operation was performed'));
        }

        //storeデータを取得し変数へと収納する
        $storeData =  Store::find($id);

        //後に変更がしやすいよう一つ一つ代入していく
        $storeData->store_name   = $request->store_name;
        $storeData->branch_name  = $request->branch_name;
        $storeData->email        = $request->email;
        $storeData->address      = $request->address;
        $storeData->password     = Hash::make($request->password);


        $storeData->update();
        Log::info('保存する中身の確認：' . $storeData);

        return redirect('/store/home')->with('flash_message', __('Profile Updated'));
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
