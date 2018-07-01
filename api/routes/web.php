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

Route::get('user', ['as' => 'user.all', 'uses' => 'UsersController\UsersController@index']);
Route::post('user', ['as' => 'user.store', 'uses' => 'UsersController\UsersController@store']);
Route::get('user/{id}', ['as' => 'user.show', 'uses' => 'UsersController\UsersController@show']);
Route::put('user/{id}', ['as' => 'user.update', 'uses' => 'UsersController\UsersController@update']);
Route::delete('user/{id}', ['as' => 'user.delete', 'uses' => 'UsersController\UsersController@delete']);