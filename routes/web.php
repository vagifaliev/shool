<?php

use Illuminate\Support\Facades\Route;

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

Route::match(['get', 'post'],'/admin', ['uses' => 'DwgController@execute', 'as' => 'sms']);
Route::match(['get', 'post'],'/frame0', ['uses' => 'Frame@frame0', 'as' => 'frame0']);
Route::match(['get', 'post'],'/frame1', ['uses' => 'Frame@frame1', 'as' => 'frame1']);
Route::match(['get', 'post'],'/frame1/status', ['uses' => 'Frame@status', 'as' => 'status']);
Route::match(['get', 'post'],'/frame1/fetch', ['uses' => 'Frame@fetch', 'as' => 'fetch']);
Route::match(['get', 'post'],'/frame1/balans/{id1}/{id2}/{subId}/{id3}', ['uses' => 'Frame@balansSim', 'as' => 'balans']);
Route::match(['get', 'post'],'/frame2', ['uses' => 'Frame@frame2', 'as' => 'frame2']);
Route::match(['get', 'post'],'/sendsms', ['uses' => 'Frame@sendSms', 'as' => 'sendsms']);
Route::match(['get', 'post'],'/statussms', ['uses' => 'Frame@statusSms', 'as' => 'statusSms']);
Route::match(['get', 'post'],'/upload', ['uses' => 'Frame@upload', 'as' => 'upload']);
Route::match(['get', 'post'],'/uploadfile', ['uses' => 'UploadFileController@showUploadFile', 'as' => 'uploadfile']);

