<?php
Auth::routes();

// needs to be there otherwise it won't be registered.
// still only admins can access it.
Route::get('/books/create','BookController@create');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::resource('/books', 'BookController')->only('index', 'show');
	Route::post('/books/search', 'BookController@search');

	Route::group(['middleware' => ['admin']], function () {
		Route::resource('/loans', 'LoanController');
		Route::post('/loans/search', 'LoanController@search');
		Route::post('/books/upload', 'BookController@upload');
		Route::resource('/books', 'BookController')->except('index', 'show');

		// temp test pages
		Route::get('/userspage', 'UserController@index');
		Route::get('/userspage/create', 'UserController@create');
	});
});
