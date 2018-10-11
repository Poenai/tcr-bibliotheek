<?php

use Carbon\Carbon;


$factory->define(App\Loan::class, function () {
	return [
		'user_id'     => 1,
		'book_id'     => \App\Book::all()->random()->id,
		'loan_date'   => Carbon::now(),
		'return_date' => Carbon::now(),
	];
});
