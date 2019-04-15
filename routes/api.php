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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/ping', 'UserController@ping');
Route::group(['prefix'=>'/admin'],function(){
    Route::get('/find-all','AdminController@findAll');
    Route::get('/login','AdminController@fnLogin');
    Route::post('/create','AdminController@fnCreate');
});

