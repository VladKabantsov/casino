<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['social.auth'])->group(function () {

    Route::resource('user', 'UserController');

    Route::get('referral-users', 'UserController@getReferrals');

    Route::get('wins', 'UserController@getWins');

    Route::get('completed-rounds', 'CompletedRoundController@index');
});
