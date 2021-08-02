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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'Users\UserController@loginTop'); //ログイン画面

// Route::get('/register', 'Users\UserController@register'); //新規登録画面
// Route::post('/register', 'Users\UserController@registerDone'); //新規登録したら情報をDBへ保存してログイン画面へ
//上記については、/vendor/laravel/framework/src/Illuminate/Routing/Router.phpにて変更入れてみた。Auth::routesが機能するはず


Route::group(['prefix' => 'user'], function(){
    Route::get('edit', 'Users\UserController@profileEdit');
    Route::get('/', 'Users\UserController@userProfieIndex');
});



Route::get('/home', 'Users\UserController@homeDisplay')->middleware('auth');


Route::group(['prefix' => 'vaccine'],function(){
    Route::get('/', 'Users\VaccineController@index');
    Route::get('details', 'Users\VaccineController@details');
    Route::get('details/edit', 'Users\VaccineController@edit');
});

Route::group(['prefix' => 'child', 'middleware' => 'auth'],function(){
    Route::get('edit', 'Users\ChildController@edit');
    Route::get('/', 'Users\ChildController@index');
    Route::get('add', 'Users\ChildController@add');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
