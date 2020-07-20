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
use App\Rules\AlphaNumHalf;
use Illuminate\Support\Facades\Log;

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
        $prefs = config('pref');
        // Log::info($prefs);
        return view('store.auth.register', compact('prefs'));
    }

    // バリデーション
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'         => ['required', 'string', 'max:255'],
            'branch_name'  => ['required', 'string', 'max:255'],
            'zip'          => ['required', new AlphaNumHalf, 'numeric'],
            'prefectural'  => ['required', 'string'],
            'address'      => ['required', 'string', 'max:255'],
            'tel'          => ['required', 'numeric', 'regex:/^[a-zA-Z0-9-]+$/'],
            'manager_name' => ['required', 'string', 'max:255'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:stores',  new AlphaNumHalf],
            'password'     => ['required', 'string', 'min:6', 'confirmed',  new AlphaNumHalf],
        ]);
    }

    // 登録処理
    protected function create(array $data)
    {
        return Store::create([
            'name'         => $data['name'],
            'branch_name'  => $data['branch_name'],
            'zip'          => $data['zip'],
            'prefectural'  => $data['prefectural'],
            'address'      => $data['address'],
            'tel'          => $data['tel'],
            'manager_name' => $data['manager_name'],
            'email'        => $data['email'],
            'password'     => Hash::make($data['password']),
        ]);
    }
}
