<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PicController@index'
)->name('home');
 
Route::get('/create/{item}', 'PicController@create')->name('create');

Route::post('/store', 'PicController@store')->name('store');


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/welcome', 'HomeController@index');

Auth::routes();
