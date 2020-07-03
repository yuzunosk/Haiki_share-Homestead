<?php

namespace App\Mail;

use Abraham\TwitterOAuth\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;


class sendPurchaseMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($to)
    {
        Log::info('---------読み込み開始-----------');

        $this->data = $to;
        Log::info($this->data);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('---------メール作成開始-----------');
        Log::info('」」」」」」」」」」」」」」」」」」');

        $this->text('mails.buy_text')
            ->from('XXX@XXXXX', 'Reffect')
            ->subject('購入メールのテストを行っています。')
            ->with([
                'email' => $this->data[0]['email'],
                'name' => $this->data[0]['name']
            ]);

        $this->text('mails.buy_text')
            ->from('XXX@XXXXX', 'Reffect')
            ->subject('購入メールのテストを行っています。')
            ->with([
                'email' => $this->data[1]['email'],
                'name' => $this->data[1]['name']
            ]);
        Log::info('---------メール送信完了-----------');

        return;
    }
}
