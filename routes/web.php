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

Auth::routes();
Route::get('/','VideoController@index');


Route::get('/home', 'HomeController@index')->name('home');


## Video
Route::get('/video/questions', 'VideoController@getQuestions');
Route::post('user/video/question/answer', 'VideoController@postUserAnswer');