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



Route::group(array('prefix' => 'api'), function()
    {
      Route::post('/uploadfile/{username}','FileController@uploadFile');
      Route::get('/showfiles/{username}','FileController@showFiles');
      Route::get('/downloadfile/{filename}','FileController@downloadFile');

    });
