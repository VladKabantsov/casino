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

Route::get('/login/vk', 'AuthController@vkAuth');
Route::get('/login/ok', 'AuthController@okAuth');

Route::get('/login/vk/user', 'AuthController@vkUser');
Route::get('/login/ok/user', 'AuthController@okAuth');
