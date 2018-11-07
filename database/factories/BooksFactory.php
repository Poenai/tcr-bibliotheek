<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
	return [
		'title'     => $faker->firstName,
		'coverpath' => '/bookcovers/_book-cover-placeholder.png',
		'content'   => $faker->paragraphs(5,true),
		'author'    => $faker->firstName . ' ' . $faker->lastName,
	];
});
