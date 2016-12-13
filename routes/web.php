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
Route::post('/pic/search', 'PicController@postSearch')->name('postSearch');

# View all books
Route::get('/books', 'BookController@index')->name('books.index')->middleware('auth');
Route::get('/', 'PageController@welcome');  
//Route::get('/', 'BookController@index')->name('books.index');

# Display form to add a new book
Route::get('/books/create', 'BookController@create')->name('books.create')->middleware('auth');
Route::get('/', 'PageController@welcome'
)->name('welcome');

Route::get('/home', 'PicController@index'
)->name('home')->middleware('auth');
 
Route::get('/create/{item}', 'PicController@create')->name('create');

Route::post('/store', 'PicController@store')->name('store');


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get("/register", 'Auth\RegisterController@register')->name('register');
Route::get('/welcome', 'HomeController@index')->name('welcome');

Auth::routes();
