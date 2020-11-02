<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;


class submissionMail extends Mailable
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
        Log::info("dataの中身を確認");
        Log::info($this->data);
        $this->title = $this->data['subject'];


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

        $this->text('mails.submission')
            ->from($this->data['email'], 'Reffect')
            ->subject($this->title)
            ->with([
                'name' => $this->data['name'],
                'content' => $this->data['content'],
            ]);


        Log::info('---------メール送信完了-----------');

        return;
    }
}
