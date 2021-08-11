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

//ユーザーの情報に関するもの
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
    Route::get('edit', 'Users\UserController@profileEdit');
    Route::get('/', 'Users\UserController@userProfieIndex');
});

//ホーム
Route::get('/home', 'Users\UserController@homeDisplay')->middleware('auth');

/**カレンダー */
Route::get('/calendar', 'Users\CalendarController@index')->middleware('auth');
Route::get('/calendar/detail', 'Users\CalendarController@detail')->middleware('auth');

//予防接種に関するもの
Route::group(['prefix' => 'vaccine', 'middleware' => 'auth'],function(){
    Route::get('/', 'Users\VaccineController@index');
    Route::get('details', 'Users\VaccineController@details');
    Route::get('details/edit', 'Users\VaccineController@edit');
});

//こどもに関するもの
Route::group(['prefix' => 'child', 'middleware' => 'auth'],function(){
    Route::get('edit', 'Users\ChildController@edit');
    Route::get('/', 'Users\ChildController@index');
    Route::get('add', 'Users\ChildController@add');
    Route::post('add', 'Users\ChildController@addDone'); //child_add.blade.phpにてaction入れているが、こちらにも残す必要性があるか聞く
});

Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');
