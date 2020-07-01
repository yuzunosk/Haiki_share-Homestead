<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\Log;




class tieToTweetController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('-------Tweet投稿ページ表示--------');
        Log::info('」」」」」」」」」」」」」」」」」」');


        $twitter = new TwitterOAuth(
            env('TWITTER_CLIENT_ID'),
            env('TWITTER_CLIENT_SECRET'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET')
        );

        Log::info('POST情報取得' . $request);


        $twitter->post("statuses/update", [
            "status" =>
            'New!' . PHP_EOL .
                'おすすめの商品!' . PHP_EOL .
                'タイトル「' . $request->title . '」' . PHP_EOL .
                '#プログラミング  #テスト' . PHP_EOL .
                'https://www.test.haikiya_share.com/' . $request->id
        ]);
    }
}
