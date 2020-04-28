<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //ログインしているかチェック それがユーザーかストアーか判断している
        if (Auth::guard($guard)->check() && $guard === 'user') {
            return redirect('/user/home');
        }elseif(Auth::guard($guard)->check() && $guard === 'store') {
            return redirect('/store/home');
        }

        return $next($request);
    }
}
