<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\models\User;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\UserProfileRequest;

class UserProfileController extends Controller
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
        Log::info('------ユーザープロフィール編集--------');
        Log::info('」」」」」」」」」」」」」」」」」」」」');

        //idかどうか判定
        if (!ctype_digit($id)) {
            return redirect()->route('user.home')->with('flash_message', __('Invalid operation was performed'));
        }

        $userData = User::find($id);
        Log::info('取得したデータ：' . $userData);


        return view('user.prof_edit', compact('userData'));
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
        Log::info('「「「「「「「「「「「「「「「「「「「「');
        Log::info('----ユーザープロフィール更新処理開始----');
        Log::info('」」」」」」」」」」」」」」」」」」」」');
        //idかどうか判定
        if (!ctype_digit($id)) {
            Log::info('正しいidではありません');
            return redirect('/store/home')->with('flash_message', __('Invalid operation was performed'));
        }

        //storeデータを取得し変数へと収納する
        $userData =  User::find($id);

        //後に変更がしやすいよう一つ一つ代入していく
        $userData->name         = $request->name;
        $userData->email        = $request->email;
        $userData->address      = $request->address;
        $userData->password     = $request->password;

        $userData->save();
        Log::info('保存する中身の確認：' . $userData);

        return redirect('/user/home')->with('flash_message', __('Profile Updated'));
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
