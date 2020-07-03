<?php

namespace App\Http\Controllers\Store\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/store/home';

    public function __construct()
    {
        $this->middleware('guest:store')->except('logout');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('store');
    }

    // ログイン画面
    public function showLoginForm()
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('--------ログイン処理開始----------');
        Log::info('」」」」」」」」」」」」」」」」」」');

        return view('store.auth.login');
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('--------ログアウト処理開始----------');
        Log::info('」」」」」」」」」」」」」」」」」」');

        Log::info($request);


        Auth::guard('store')->logout();

        return $this->loggedOut($request);
    }

    // ログアウトした時のリダイレクト先
    public function loggedOut(Request $request)
    {
        return redirect(route('store.login'));
    }
}
