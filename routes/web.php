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

Route::get('/', 'Users\UserController@loginTop'); //ログイン画面　ログインしていたらHOMEへ



//ユーザーの情報に関するもの
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
    Route::get('edit', 'Users\UserController@profileEdit');
    Route::post('edit', 'Users\UserController@profileUpdate');
    Route::get('/', 'Users\UserController@userProfieIndex');
});


//ホーム
Route::get('/home', 'Users\UserController@homeDisplay')->middleware('auth');


//カレンダーに関するものを入れるスペース
Route::group(['prefix' => 'calendar', 'middleware' => ['auth', 'checkchild',]],function(){
    Route::get('day', 'Users\ScheduleController@day');
    Route::get('day/add', 'Users\ScheduleController@add');
    Route::post('day/add', 'Users\ScheduleController@addDone');
    
    Route::get('details', 'Users\ScheduleController@details');
    Route::post('details', 'Users\ScheduleController@detailDelete');
    Route::get('details/edit', 'Users\ScheduleController@edit');
    Route::post('details/edit', 'Users\ScheduleController@update');
});
Route::get('/calendar', 'Users\ScheduleController@index')->middleware('auth');



//予防接種に関するもの
Route::group(['prefix' => 'vaccine', 'middleware' => ['auth', 'checkchild',]],function(){
    Route::get('details', 'Users\VaccineController@details');
    Route::get('details/edit', 'Users\VaccineController@edit');
    Route::post('details/edit', 'Users\VaccineController@update');
});
Route::get('/vaccine', 'Users\VaccineController@index')->middleware('auth');


//こどもに関するもの
Route::group(['prefix' => 'child', 'middleware' => ['auth','checkchild',]],function(){
    Route::get('edit', 'Users\ChildController@edit');
    Route::post('edit', 'Users\ChildController@update');
    Route::post('/', 'Users\ChildController@childDelete');
});
Route::get('/child', 'Users\ChildController@index')->middleware('auth');
Route::get('/child/add', 'Users\ChildController@add')->middleware('auth');
Route::post('/child/add', 'Users\ChildController@addDone')->middleware('auth');



Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');
