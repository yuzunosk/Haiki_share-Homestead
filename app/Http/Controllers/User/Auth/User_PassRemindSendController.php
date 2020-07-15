<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendResetMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;



use App\Models\User;
use Illuminate\Http\Request;

class User_PassRemindSendController extends Controller
{

    use SendsPasswordResetEmails;


    public function __construct()
    {
        $this->middleware('guest:user');
    }

    public function show()
    {
        Log::info('「「「「「「「「「「「「「「「「「「「「「「');
        Log::info('----パスワードリセット処理画面を表示------');
        Log::info('」」」」」」」」」」」」」」」」」」」」」」');

        return view('user.auth.passwords.user-email');
    }

    public function resetEmail(Request $request)
    {
        Log::info('「「「「「「「「「「「「「「「「「「「「「「');
        Log::info('----パスワードリセット Email送信処理開始------');
        Log::info('」」」」」」」」」」」」」」」」」」」」」」');

        $request->validate([
            'email' => 'email:rfc|required|max:255|string'
        ], [
            'email.required'       => 'emailは必須入力です',
            'email.max'            => 'emailは255文字以内で入力して下さい',
            'email.string'         => 'emailは文字で入力して下さい',
            'email.email:rfc'      => 'email規格に合っていません'
        ]);

        // レコードがあるかどうか判定
        $res = User::where("email", $request->email)->count();
        Log::info($res);

        // 判定結果が0ではない場合
        if ($res) {
            Log::info('このemailアドレスは登録されています');
            // 取得データを保存する
            $auth_key = $request->_token;
            Log::info('tokenは、' . $auth_key);

            $to = $request->email;
            $token = $auth_key;

            Mail::to($to)->send(new SendResetMail($to, $token));

            //セッションに情報を詰める

            session(['auth_key' => $auth_key]);
            session(['email'    => $request->email]);
            session(['auth_key_limit' =>  time() + 60 * 30]); //現在の時刻から30分後を設定

            $Session = $request->session()->all();

            //セッションデータの確認
            Log::info($Session);
        } else {
            Log::info('このemailアドレスは登録されていません');
            return redirect()->route('user.password.request')->with('flash_message', __('このEmailアドレスは登録されておりません.'));
        }

        return redirect()->route('user.password.reset', compact('token'))->with('flash_message', __('入力されたEmailアドレスへメールを送信いたしました.'));
    }
}
