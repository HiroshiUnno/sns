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
/*
Route::get('/', function () {
    return view('layouts.sample');
});
*/
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
//
Route::get('/', 'PostController@index');
Route::get('/post/create', 'PostController@add')->middleware('auth');
Route::post('/post/create', 'PostController@create')->middleware('auth');



Route::get('/relation/mypage', function() {
    return view('relation.mypage');
});
