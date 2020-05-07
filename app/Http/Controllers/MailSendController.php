<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationMail;
use App\Mail\StoreConfirmationMail;
use App\Models\User;
use App\Models\Store;

class MailSendController extends Controller
{


    public function send()
    {

        $user  = User::find(4);
        $store = Store::find(1);

        Mail::to($user)->send(new ConfirmationMail($user));
        Mail::to($store)->send(new StoreConfirmationMail($store));
    }
}
