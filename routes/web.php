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
    Route::post('edit', 'Users\UserController@profileUpdate');
    Route::get('/', 'Users\UserController@userProfieIndex');
});


//ホーム
Route::get('/home', 'Users\UserController@homeDisplay')->middleware('auth');


//カレンダーに関するものを入れるスペース
Route::get('/calendar', 'Users\ScheduleController@index')->middleware('auth');
Route::get('/calendar/day', 'Users\ScheduleController@day')->middleware('auth');
Route::get('/calendar/day/add', 'Users\ScheduleController@add')->middleware('auth');
Route::post('/calendar/day/add', 'Users\ScheduleController@addDone')->middleware('auth');

Route::get('/calendar/details', 'Users\ScheduleController@details')->middleware('auth');
Route::get('/calendar/details/edit', 'Users\ScheduleController@edit')->middleware('auth');
Route::post('/calendar/details/edit', 'Users\ScheduleController@update')->middleware('auth');



//予防接種に関するもの
Route::group(['prefix' => 'vaccine', 'middleware' => ['auth', 'checkchild',]],function(){
    Route::get('/', 'Users\VaccineController@index');
    Route::get('details', 'Users\VaccineController@details');
    Route::get('details/edit', 'Users\VaccineController@edit');
    Route::post('details/edit', 'Users\VaccineController@update');
});


//こどもに関するもの
Route::group(['prefix' => 'child', 'middleware' => ['auth','checkchild',]],function(){
    Route::get('edit', 'Users\ChildController@edit');
    Route::post('edit', 'Users\ChildController@update');
    Route::get('/', 'Users\ChildController@index');
    Route::get('add', 'Users\ChildController@add');
    Route::post('add', 'Users\ChildController@addDone');
    
});

Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');
