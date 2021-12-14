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

Route::get('/survey','HomeController@index');
Route::get('/survey/grab/{nd_internet}','HomeController@getData');
Route::post('/survey/create','HomeController@createSurvey');