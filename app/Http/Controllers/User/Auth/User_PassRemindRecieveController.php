<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\AlphaNumHalf;
use App\Rules\Hankaku;

use Illuminate\Support\Facades\Hash;
use App\models\User;

class User_PassRemindRecieveController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest:user');
    }

    public function show(Request $request)
    {

        Log::info('「「「「「「「「「「「「「「「「「「「「「「');
        Log::info('------パスワードリセットviewを表示--------');
        Log::info('」」」」」」」」」」」」」」」」」」」」」」');

        //セッションに認証キーがあるか確認
        if ($request->session()->has('auth_key')) {

            //あれば画面遷移
            return view('user.auth.passwords.user-reset');
        } else {
            //なければ元の画面へ
            return redirect()->route('user.password.request');
        }
    }

    public function update(Request $request)
    {

        Log::info('「「「「「「「「「「「「「「「「「「「「「「');
        Log::info('------パスワードアップデート処理--------');
        Log::info('」」」」」」」」」」」」」」」」」」」」」」');


        $request->validate([
            'token'                 => 'required|max:255|string',
            'password'              => 'required|string|max:255|confirmed',
            'password_confirmation' => 'required|string|max:255'

        ], [
            'token.required'       => 'tokenは必須入力です',
            'token.max'            => 'tokenは255文字以内で入力して下さい',
            'token.string'         => 'tokenは文字で入力して下さい',
            'password.required'    => 'passwordは必須入力です',
            'password.max'         => 'passwordは255文字以内で入力して下さい',
            'password.string'      => 'passwordは文字で入力して下さい',
            'password.confirmed'   => 'passwordが再入力と一致していません',
            'password_confirmation.required'     => 'password_confirmationは必須入力です',
            'password_confirmation..max'         => 'password_confirmationは255文字以内で入力して下さい',
            'password_confirmation..string'      => 'password_confirmationは文字で入力して下さい',
        ]);


        $auth_key = $request->token;
        Log::info('認証キー:' . $auth_key);
        Log::info('セッションデータ:' . $request->session()->get('auth_key'));


        if ($auth_key !== $request->session()->get('auth_key')) {
            return view('user.auth.passwords.user-reset')->with('flash_message', '認証キーが合いません、正しく入力してください');
        }
        Log::info('認証キーの照合が合っています。');

        if (time() > $request->session()->get('auth_key_limit')) {
            Log::info('セッションデータの期限:' . $request->session()->get('auth_key_limit'));
            return redirect()->route('user.password.request')->with('flash_message', '認証キーの期限が切れています。再度認証キー取得を行ってください。');
        }

        $userdata = User::where("email", $request->session()->get('email'))->first();
        Log::info("ユーザー情報:" . $userdata);

        $userdata->password = Hash::make($request->password);

        $userdata->update();
        Log::info('保存する中身の確認：' . $userdata);


        return redirect()->route('user.login')->with('flash_message', 'パスワードは正しく変更されました');
    }
}
