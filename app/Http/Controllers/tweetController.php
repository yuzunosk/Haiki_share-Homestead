<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\Log;


class tweetController extends Controller
{
    public function tweet(Request $request)
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('-------Twitter投稿実行ページ表示--------');
        Log::info('」」」」」」」」」」」」」」」」」」');


        Log::info('POST情報取得' . $request);

        $twitter = new TwitterOAuth(
            config('twitter.consumer_key'),
            config('twitter.consumer_secret'),
            config('twitter.access_token'),
            config('twitter.access_secret')
        );

        //
        // アクセストークンを使用しているユーザーのタイムラインを10件取得する
        $request = $twitter->get(
            'statuses/user_timeline',
            array(
                'count' => '10',
            )
        );

        if ($twitter->getLastHttpCode() == 200) {
            // ツイート成功
            print "tweeted\n";
        } else {
            // ツイート失敗
            print "tweet failed\n";
        }
    }

    public function show()
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('-------Tweet投稿ページ表示--------');
        Log::info('」」」」」」」」」」」」」」」」」」');



        return view('sns.tweetShow');
    }
}
