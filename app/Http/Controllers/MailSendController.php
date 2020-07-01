<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationMail;
use App\Mail\StoreConfrimationMail;
use App\Mail\sendPurchaseMail;
use App\Models\User;
use App\Models\Store;

class MailSendController extends Controller
{


    public function send()
    {

        $user  = User::find(4);

        Mail::to($user)->send(new ConfirmationMail($user));
    }

    public function sendStore()
    {

        $store = Store::find(1);

        Mail::to($store)->send(new StoreConfrimationMail($store));
    }

    public function sendPurchase()
    {
        $store = Store::find(1);

        Mail::to($store)->send(new sendPurchaseMail($store));
    }
}
