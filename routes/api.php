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
//pusher
// Route::group(['middleware' => 'auth:api'], function(){  
//     Route::post('pusher', 'API\MessageController@pusher');
// });

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
    Route::get('user/{id}','API\UserController@getUserById');
    Route::post('user/{id}','API\UserController@editUser');
    Route::post('user_foto/{id}','API\UserController@editImage');
});

//ahlipraktisi
Route::group(['middleware' => 'auth:api'], function(){  
    Route::get('list_ahli','API\UserController@getlistahli');

});
Route::post('register_ahli', 'API\UserController@registerAhliPraktisi');

//farmmanager
Route::group(['middleware' => 'auth:api'], function(){  
    Route::post('assign', 'API\UserController@assignFarmManager');
});
Route::post('register_farmmanager', 'API\UserController@registerFarmManager');

//pemiilik lahan
Route::post('register_pemiliklahan', 'API\UserController@registerPemilikLahan');


//message
Route::group(['middleware' => 'auth:api'], function(){  
    Route::get('messages/{message_id}','API\MessageController@fetch');
   // Route::post('messages','API\MessageController@sentMessage');   
   Route::post('messages','FirebaseController@firestore'); 
   Route::post('photomessage','FirebaseController@photomsg'); 
   Route::post('image', 'API\UserController@uploadImage');
        
});

Route::get('sample','SampleController@index');

//farm
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('farm','API\FarmController@register');
    Route::get('farm', 'API\FarmController@getFarm');
    Route::post('term', 'API\FarmController@postTerm');
    Route::get('term/{id_pemilik_lahan}', 'API\FarmController@getTerms');
    Route::put('farm/{id_farm}','API\FarmController@editFarm');

    Route::post('groupfarm','API\FarmController@postgroupfarm');
    Route::get('groupfarm/{id}','API\FarmController@getGroupfarm');
    Route::get('user_groupfarm','API\FarmController@getPemiliklahan');
    Route::get('varietas','API\FarmController@getVarietas');
    Route::get('list_farmmanager/{id_group_farm}','API\FarmController@getfarmmanagergroup');
    Route::get('groupfarm_pemiliklahan','API\FarmController@getGroupfarmpemiliklahan');
});

//Schedule
Route::post('schedule','API\ScheduleController@addSchedule');

//notification
Route::post('pushmessage','API\MessageController@sendNotif');

//laporan
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('laporan','API\LaporanController@postLaporan');
    Route::get('laporans','API\LaporanController@getLaporans');
    Route::get('laporan/{id_laporan}','API\LaporanController@getDetaillaporan');
    Route::post('image_upload','API\UserController@uploadImage');
});
Route::get('laporan_export/{id_group_farm}', 'API\LaporanController@laporanExport');

//Task
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('task','API\TaskController@postTask');
    Route::get('tasks/{id_pemilik_lahan}','API\TaskController@getTasks');
    Route::get('task/{id_task}','API\TaskController@getDetailtask');
    Route::put('task/{id_task}','API\TaskController@updateStatustask');
    Route::put('task_pemiliklahan/{id_task}','API\TaskController@editTaskPemiliklahan');
});

//Task2
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('task2','API\Task2Controller@postTask');
    Route::get('task2s/{id_pemilik_lahan}','API\Task2Controller@getTasks');
    Route::put('task2_pemiliklahan/{id_task}','API\Task2Controller@editTaskPemiliklahan');
});


