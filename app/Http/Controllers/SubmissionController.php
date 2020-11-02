<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Mail\submissionMail;
use Illuminate\Support\Facades\Mail;




class SubmissionController extends Controller
{
    public function show()
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('-------投稿フォーム表示--------');
        Log::info('」」」」」」」」」」」」」」」」」」');
        
        return view('info');
    }


    public function post(Request $request) {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('-------投稿メール送信--------');
        Log::info('」」」」」」」」」」」」」」」」」」');

        //送信先アドレス
        $to = "yuzuha3ds@gmail.com";
        $data = [
                'email' => $request->email,
                'name' => $request->name,
                'subject' => $request->subject,
                'content' => $request->content,
        ];
        Log::info('送信データの中身確認');
        Log::info($to);
        Log::info($data);
        Mail::to($to)->send(new submissionMail($data));
        // return view('info');

        return redirect()->route('submit')->with('flash_message', 'メールを送信しました');
    }
}
