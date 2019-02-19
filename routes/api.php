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
    Route::get('users/{role}','API\UserController@getUsers');
    Route::post('logout','API\UserController@logout');
});
//pusher
Route::group(['middleware' => 'auth:api'], function(){  
    Route::post('pusher', 'API\MessageController@pusher');
});

//message
Route::group(['middleware' => 'auth:api'], function(){  
    Route::get('messages/{message_id}','API\MessageController@fetch');
   // Route::post('messages','API\MessageController@sentMessage');   
   Route::post('messages','FirebaseController@firestore');         
});

Route::get('sample','SampleController@index');
Route::post('image', 'API\UserController@uploadImage');

//farm
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('farm','API\FarmController@register');
    Route::get('farm', 'API\FarmController@fetch_by_ahli');
});

//Schedule
Route::post('schedule','API\ScheduleController@addSchedule');

//notification
Route::post('pushmessage','API\MessageController@sendNotif');

//report 
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('report','API\ReportController@register');
    Route::get('report', 'API\ReportController@fetch_by_farm');
});
//form
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('form','API\FormController@addForm');
    Route::get('form', 'API\FormController@getForm');
    Route::put('form/{id}', 'API\FormController@editForm');

});


