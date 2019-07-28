<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'location' => $faker->city,
		'languages_spoken' => $faker->languageCode,
        'visited_cities' => $faker->city,
    ];
});
