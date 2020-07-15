<?php

namespace App\Mail;

use Abraham\TwitterOAuth\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendResetMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $address;
    protected $token;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($to, $token)
    {
        Log::info('---------読み込み開始-----------');

        $this->address = $to;
        $this->token   = $token;
        Log::info($this->address);
        Log::info($this->token);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info('「「「「「「「「「「「「「「「「「「');
        Log::info('---------リセットメール作成開始-----------');
        Log::info('」」」」」」」」」」」」」」」」」」');

        $this->text('mails.reset_mail')
            ->from('XXX@XXXXX', 'Reffect')
            ->subject('[パスワード再発行認証] | Haiki_share運営事務局')
            ->with([
                'address' => $this->address,
                'token'   => $this->token
            ]);

        Log::info('---------メール送信完了-----------');

        return;
    }
}
