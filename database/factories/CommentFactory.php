<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Comment::class, function (Faker $faker) {
    static $i = 1;
    return [
        'post_id' => mt_rand(1, \App\Models\Post::count()),
        'user_id' => mt_rand(1, \App\Models\User::count()),
        'content' => $faker->sentence,
        'like_count' => mt_rand(0, 100),
        'reply_count' => mt_rand(0, 10),
        'floor' => $i++,
        'selected' => mt_rand(1, 10) > 2 ? 0 : 1
    ];
});
