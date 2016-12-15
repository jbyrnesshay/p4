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
/*Route::get('/practice', 'PracticeController@index')->name('practice.index');*/
for($i = 0; $i < 100; $i++) {
    Route::get('/practice/'.$i, 'PracticeController@example'.$i)->name('practice.example'.$i);
}
 
Route::get('/search', 'PageController@search')->name('search');
Route::post('/pic/search', 'PicController@postSearch')->name('search')->middleware('auth');

Route::get('/', 'PageController@welcome'
)->name('welcome');

Route::get('/home', 'PicController@index'
)->name('home')->middleware('auth');
 
Route::get('/pics/create/{item}', 'PicController@create')->name('pics.create')->middleware('auth');

Route::post('/store', 'PicController@store')->name('store')->middleware('auth');
Route::get('/pics/{item}/edit', 'PicController@edit')->name('pics.edit')->middleware('auth');
Route::delete('/pics/{item}', 'PicController@destroy')->name('pics.delete')->middleware('auth');
Route::put('/pics/{id}', 'PicController@update')->name('pics.update')->middleware('auth');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get("/register", 'Auth\RegisterController@register')->name('register')->middleware('guest');
Route::get('/welcome', 'HomeController@index')->name('welcome')->middleware('guest');

Auth::routes();
 
 