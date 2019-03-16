<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $title = rtrim($faker->sentence, '.');

    return [
        'title' => $title,
        'description' => $faker->sentence(3),
        'cover' => $faker->imageUrl(),
        'content' => $faker->paragraphs(3, true),
        'comment_count' => mt_rand(0, 20),
        'like_count' => mt_rand(0, 200),
        'user_id' => mt_rand(1, \App\Models\User::count()),
        'give_count' => mt_rand(0, 10),
        'read_count' => mt_rand(0,3000),
        'word_count' => mt_rand(250, 1000),
        'selected_at' => array_random([standard_date(time() - mt_rand(0, 2592000)), null]),
        'commented_at' => array_random([standard_date(time() - mt_rand(0, 2592000)), null]),
        'created_at' => standard_date(),
        'updated_at' => standard_date()
    ];
});
