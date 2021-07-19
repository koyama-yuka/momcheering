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

Route::group(['prefix' => 'user'], function(){
    Route::get('edit', 'Users\UserController@profile_edit');
});

Route::get('/', 'Users\UserController@login_top');
Route::get('/register', 'Users\UserController@register');
Route::get('/home', 'Users\UserController@home_display');


Route::group(['prefix' => 'vaccine'],function(){
    Route::get('/', 'Vaccines\VaccineController@index');
});

Route::group(['prefix' => 'child'],function(){
    Route::get('edit', 'Users\ChildController@edit');
});