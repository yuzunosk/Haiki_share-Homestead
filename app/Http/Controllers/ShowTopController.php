<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ShowTopController extends Controller
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
        Log::info('---------Topページ表示----------');
        Log::info('」」」」」」」」」」」」」」」」」」');

        return view('top');
    }
}
