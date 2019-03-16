<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Draft::class, function (Faker $faker) {
    $title = rtrim($faker->sentence, '.');

    return [
        'title' => $title,
        'content' => $faker->paragraphs(3, true),
        'user_id' => mt_rand(1, \App\Models\User::count()),
        'post_id' => array_random([null, mt_rand(1, \App\Models\Post::count())]),
        'created_at' => standard_date(),
        'updated_at' => standard_date()
    ];
});
