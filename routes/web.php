<?php
// login routes
Auth::routes();

// user needs to be logged in to access this
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/books','BookController');
    Route::post('/books/upload','BookController@upload');
    Route::post('/books/search','BookController@search');
    Route::resource('/loans','LoanController');
    Route::post('/loans/search','LoanController@search');

});


// temp test pages
Route::get('/userpage', 'UserController@index');