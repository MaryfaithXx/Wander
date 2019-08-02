<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
	$filePath = storage_path('app/public/post-images');

    return [
        'location' => $faker->city,
		'languages_spoken' => $faker->languageCode,
        'visited_cities' => $faker->city,
		'cover_image' => $faker->image($filePath, 200, 200, null, false)
    ];
});
