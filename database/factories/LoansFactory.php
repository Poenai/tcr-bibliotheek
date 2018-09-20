<?php

use Carbon\Carbon;


$factory->define(App\Loan::class, function () {
	return [
		'user_id'     => 1,
		'book_id'     => 1,
		'loan_date'   => Carbon::now(),
		'return_date' => Carbon::now(),
	];
});
