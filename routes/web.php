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

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/users', 'UsersController@index');
    Route::get('/users/create', 'UsersController@create');
    Route::post('/users', 'UsersController@store');
    Route::get('/users/{id}', 'UsersController@view');
    Route::post('/users/{id}', 'UsersController@update');
    Route::get('/users/delete/{id}', 'UsersController@delete');
});

Route::get('/profile', 'ProfileController@index');
Route::post('/profile/change/password', 'ProfileController@password');
Route::post('/profile/change/avatar', 'ProfileController@avatar');
Route::post('/profile/change/email', 'ProfileController@email');

Route::get('{locale}', 'LanguageController@index');
