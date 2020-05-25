<?php

namespace App\Http\Controllers\Store\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/store/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:store');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('store');
    }

    // 新規登録画面
    public function showRegistrationForm()
    {
        return view('store.auth.register');
    }

    // バリデーション
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'         => ['required', 'string', 'max:255'],
            'branch_name'  => ['required', 'string', 'max:255'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:stores'],
            'password'     => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // 登録処理
    protected function create(array $data)
    {
        return Store::create([
            'name'         => $data['name'],
            'branch_name'  => $data['branch_name'],
            'email'        => $data['email'],
            'password'     => Hash::make($data['password']),
        ]);
    }
}
