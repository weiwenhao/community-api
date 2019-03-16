<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Collection::class, function (Faker $faker) {
    return [
        'name' => rtrim($faker->sentence),
        'avatar' => $faker->imageUrl(),
        'description' => $faker->sentence(2),
        'post_count' => mt_rand(100, 10000),
        'fans_count' => mt_rand(100, 10000),
        'user_id' => mt_rand(1, \App\Models\User::count())
    ];
});
