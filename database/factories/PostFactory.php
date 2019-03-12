<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $title = rtrim($faker->sentence, '.');

    return [
        'title' => $title,
        'code' => strtolower(str_random(8)),
        'description' => $faker->sentence(3),
        'cover' => $faker->imageUrl(),
        'content' => $faker->paragraphs(3, true),
        'comment_count' => mt_rand(0, 20),
        'like_count' => mt_rand(0, 20),
        'user_id' => mt_rand(1, \App\Models\User::count()),
        'give_count' => mt_rand(0, 10),
        'read_count' => mt_rand(0,300),
        'word_count' => mt_rand(250, 1000),
        'selected_at' => array_random([standard_date(), null])
    ];
});
