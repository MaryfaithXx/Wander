<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'location' => $faker->city,
		'languages_spoken' => $faker->languageCode,
        'visited_cities' => $faker->city,
    ];
});
