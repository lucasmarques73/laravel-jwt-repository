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

Route::post('auth/login',['as' => 'auth.login', 'uses' => 'AuthController@login']);
Route::get('auth/logout',['as' => 'auth.logout', 'uses' => 'AuthController@logout']);
Route::post('auth/refresh',['as' => 'auth.refresh', 'uses' => 'AuthController@refreshToken']);
Route::get('auth/user',['as' => 'auth.user', 'uses' => 'AuthController@getAuthUser']);

Route::get('user', ['as' => 'user.all', 'uses' => 'UsersController@index']);
Route::post('user', ['as' => 'user.store', 'uses' => 'UsersController@store']);
Route::get('user/{id}', ['as' => 'user.show', 'uses' => 'UsersController@show']);
Route::put('user/{id}', ['as' => 'user.update', 'uses' => 'UsersController@update']);
Route::delete('user/{id}', ['as' => 'user.delete', 'uses' => 'UsersController@delete']);