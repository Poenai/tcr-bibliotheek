<?php
// login routes
Auth::routes();

// user needs to be logged in to access this
Route::group(['middleware' => ['auth']], function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::resource('/books', 'BookController')->only('index', 'show');
	Route::post('/books/search', 'BookController@search');

	// user also needs to be an admin
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
