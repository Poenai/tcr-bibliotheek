<?php
// login routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// user needs to be logged in to access this
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/books','BookController');
    Route::post('/books/upload','BookController@upload');
    Route::resource('/loans','LoanController');
});