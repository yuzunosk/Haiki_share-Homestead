<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mail', 'MailSendController@send');
Route::get('/mail', 'MailSendController@storesend');
Route::get('/mail', 'MailSendController@sendPurchase');
Route::get('/top', 'ShowTopController')->name('top');
Route::get('/regist', 'show_RegistSelectController')->name('RegistSelect');
Route::get('/login', 'show_LoginSelectController')->name('LoginSelect');
Route::get('/index/{page?}/{sort?}/{order?}/{expiration?}/{prefectural?}', 'showIndexController')->name('index');
Route::get('/submit', 'SubmissionController@show')->name('submit'); //投稿フォームへ
Route::post('/submit/post', 'SubmissionController@post')->name('submit.post'); //投稿フォームへ


// buy関連
Route::post('/buy', 'BuyController@store')->name('buy.store');


//ユーザー
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => true,
        'verify'   => false,
    ]);

    //user password reset routes
    //リセットビュー表示
    Route::get('/password/reset', 'Auth\User_PassRemindSendController@show')->name('password.request');
    // パスワードリセットメール送信
    Route::post('/password/email', 'Auth\User_PassRemindSendController@resetEmail')->name('password.email');
    // パスワードリセットフォーム表示
    Route::get('/password/reset/{token}', 'Auth\User_PassRemindRecieveController@show')->name('password.reset');
    // パスワードリセット処理
    Route::post('/password/update', 'Auth\User_PassRemindRecieveController@update')->name('password.update');




    //ログイン認証後
    Route::middleware('auth:user')->group(function () {

        //TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
        //ユーザープロフィール編集
        Route::get('/profile/edit/{id}', 'UserProfileController@edit')->name('profile.edit');
        Route::post('/profile/{id}', 'UserProfileController@update')->name('profile.update');
        Route::get('/profile/{id}/delete', 'UserProfileController@destroy')->name('profile.delete');

        //ユーザーインデックス表示
        Route::get('/index/{page?}/{sort?}/{order?}/{expiration?}/{prefectural?}', 'userIndexController')->name('index');
        Route::get('/product/usershow/{id}', 'userProductController@show')->name('product.usershow');
        Route::get('/product/purchased/{page?}', 'ProductPurchasedController')->name('product.purchased');
    });
});

// ストア管理者
Route::namespace('Store')->prefix('store')->name('store.')->group(function () {


    //ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => true,
        'verify'   => false,
    ]);

    //store password reset routes
    //リセットビュー表示
    Route::get('/password/reset', 'Auth\Store_PassRemindSendController@show')->name('password.request');
    // パスワードリセットメール送信
    Route::post('/password/email', 'Auth\Store_PassRemindSendController@resetEmail')->name('password.email');
    // パスワードリセットフォーム表示
    Route::get('/password/reset{token}', 'Auth\Store_PassRemindRecieveController@show')->name('password.reset');
    // パスワードリセット処理
    Route::post('/password/update', 'Auth\Store_PassRemindRecieveController@update')->name('password.update');


    //ログイン認証後
    Route::middleware('auth:store',)->group(function () {

        //TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
        //ストアプロフィール編集
        Route::get('/profile/edit/{id}', 'StoreProfileController@edit')->name('profile.edit');
        Route::post('/profile/{id}', 'StoreProfileController@update')->name('profile.update');
        Route::get('/profile/{id}/delete', 'StoreProfileController@destroy')->name('profile.delete');

        //商品関係ルーティング
        Route::get('/product/new', 'ProductController@new')->name('product.new');
        Route::get('/product/show/{id}', 'ProductController@show')->name('product.show');
        Route::post('/product', 'ProductController@create')->name('product.create');
        Route::get('/product/index/{page?}/{sort?}/{order?}/{expiration?}/{prefectural?}', 'ProductController@index')->name('product.index');
        Route::get('/product/edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('/product/{id}', 'ProductController@update')->name('product.update');
        Route::get('/product/delete/{id}', 'ProductController@destroy')->name('product.delete');
        Route::get('/product/exhibition/{page?}', 'ProductExhibitionController')->name('product.exhibition');
        Route::get('/product/sale/{page?}', 'ProductSaleController')->name('product.sale');
    });
});
