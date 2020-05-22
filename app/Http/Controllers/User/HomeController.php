<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function __construct()

    {
        $this->middleware('auth:user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info('「「「「「「「「「「「「「「「「「「「「');
        Log::info('----------ユーザーホーム------------');
        Log::info('」」」」」」」」」」」」」」」」」」」」');

        //現在ログインしているユーザーのデータを取得する
        $userData      = Auth::user();
        $id             = $userData->id;
        //buyDataとgoodDataはまだ未完成
        $buyData    = User::find($id)->orderBy('id', 'desc')->limit(5)->get();
        $goodData   = User::find($id)->orderBy('id', 'desc')->limit(5)->get();
        Log::info('ログインストアデータ:' . $userData);
        Log::info('ストアid:' . $id);
        Log::info('購入データ:' . $buyData);
        Log::info('いいねデータ:' . $goodData);

        return view('user.home', compact(['userData', 'buyData', 'goodData']));
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
     * user a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function user(Request $request)
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
