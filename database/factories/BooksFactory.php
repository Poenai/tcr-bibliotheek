<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Book::class, function (Faker $faker) {
	return [
		'title'     => $faker->firstName,
		'coverpath' => '/bookcovers/_book-cover-placeholder.png',
		'content'   => $faker->paragraph(5),
		'author'    => $faker->firstName . ' ' . $faker->lastName,
	];
});
