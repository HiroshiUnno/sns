<?php

use Illuminate\Support\Facades\Route;

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
    return view('layouts.layout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ログイン画面を表示する
Route::get('/loginForm', function () {
    return view('auth.login');
});
//アカウント作成画面を表示する
Route::get('/registerForm', function() {
    return view('auth.register');  
});
