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
Route::post('/mypage', 'PostController@delete')->middleware('auth');

Route::get('/mypage', 'UserController@add')->middleware('auth');
Route::get('/mypage', 'UserController@show')->middleware('auth');
Route::get('/users', 'UserController@index')->middleware('auth');

Route::post('/users{user}/follow', 'UserController@follow')->middleware('auth')->name('follow');
Route::delete('/users/{user}/unfollow', 'UserController@unfollow')->middleware('auth')->name('unfollow');

Route::get('/users/edit', 'ProfileController@add')->middleware('auth');
Route::get('/users/edit', 'ProfileController@edit')->middleware('auth')->name('edit');
Route::post('/users/edit', 'ProfileController@update')->middleware('auth')->name('update');
