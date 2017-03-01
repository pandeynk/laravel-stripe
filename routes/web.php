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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', 'PagesController@index');
Route::post('charge', 'PaymentsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/lang', 'LanguageController@lang')->middleware('lang');
Route::get('{locale}', 'LanguageController@index');
