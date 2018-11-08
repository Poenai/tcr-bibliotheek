<?php

use Carbon\Carbon;

$factory->define(App\Loan::class, function () {
    return [
        'user_id' => \App\User::all()->random()->id,
        'book_id' => \App\Book::all()->random()->id,
        'loan_date' => Carbon::now()->subWeeks(2),
        'return_date' => Carbon::now()->subWeeks(2)->addDays(rand(0, 30)),
    ];
});
