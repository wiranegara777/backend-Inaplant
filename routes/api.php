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
Route::post('register', 'API\UserController@register');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//user
Route::post('login', 'API\UserController@login');
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('user_info', 'API\UserController@details');
});
//pusher
Route::group(['middleware' => 'auth:api'], function(){  
    Route::post('pusher', 'API\MessageController@pusher');
});

//message
Route::group(['middleware' => 'auth:api'], function(){  
    Route::get('messages/{message_id}','API\MessageController@fetch');
    Route::post('messages','API\MessageController@sentMessage');      
});
Route::get('sample','SampleController@index');
Route::post('image', 'API\UserController@uploadImage');

