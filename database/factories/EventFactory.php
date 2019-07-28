<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
	
	$filePath = storage_path('app/public/event-images');
	
    return [
        'name' => $faker->sentence(10, true),
		'city' => $faker->city,
        'country' => $faker->country,
		'details' => $faker->paragraph(3, true),
        'date' => $faker->dateTimeBetween('+0 days', '+2 years'),
        'image' => $faker->image($filePath, 200, 200, null, false)
    ];
});