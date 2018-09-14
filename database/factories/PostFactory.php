<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->sentence,
        'cover' => $faker->imageUrl(),
        'content' => $faker->paragraphs(mt_rand(5, 10), true),
        'comment_count' => mt_rand(0, 20),
        'like_count' => mt_rand(0, 20),
        'user_id' => mt_rand(1, \App\Models\User::count()),
        'give_count' => mt_rand(0, 10),
        'read_count' => mt_rand(0,300),
        'word_count' => mt_rand(250, 8000),
        'slug' => str_random(),
    ];
});
