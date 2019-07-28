<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

	$filePath = storage_path('app/public/post-images');

    return [
        'title' => $faker->name,
        'details' => $faker->paragraph(3, true),
        'image' => $faker->image($filePath, 200, 200, null, false)
    ];
});
