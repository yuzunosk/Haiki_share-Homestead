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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function(){
    Route::get('home', 'storeHomeController@index')->name('store_auth.home');
    Route::get('login', 'storeAuth\LoginController@showLoginForm')->name('store_auth.login');
    Route::post('login', 'storeAuth\LoginController@login')->name('store_auth.login');
    Route::post('logout', 'storeAuth\LoginController@logout')->name('store_auth.logout');
    Route::get('register', 'storeAuth\RegisterController@showRegisterForm')->name('store_auth.register');
    Route::post('register', 'storeAuth\RegisterController@register')->name('store_auth.register');
});