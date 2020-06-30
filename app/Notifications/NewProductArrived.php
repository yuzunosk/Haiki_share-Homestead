<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\Product;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Twitter\TwitterChannel;
use NotificationChannels\Twitter\TwitterStatusUpdate;



class NewProductArrived extends Notification
{
    use Queueable;

    private $product;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TwitterChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toTwitter($notifiable)
    {
        $text = "新着!\n【" . $this->product->name . "】という商品が登録されました\n" .
            url('product/' . $this->product->id);
        $attachment = $this->product->getAttachment('product_image');
        return (new TwitterStatusUpdate($text))->withImage($attachment->path);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
