<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::resource('/books','BookController');