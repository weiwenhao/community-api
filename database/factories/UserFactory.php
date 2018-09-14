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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'nickname' => $faker->name,
        'avatar' => $faker->imageUrl(),
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->phoneNumber,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret

        'follow_count' => mt_rand(0, 100),
        'fans_count' => mt_rand(0, 100),
        'post_count' => mt_rand(0, 100),
        'word_count' => mt_rand(0, 100),
        'like_count' => mt_rand(0, 100)
    ];
});
