<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CommentReply::class, function (Faker $faker) {
    return [
        'comment_id' => mt_rand(1, \App\Models\Comment::count()),
        'user_id' => mt_rand(1, \App\Models\User::count()),
        'content' => $faker->sentence(3),
        'call_user' => mt_rand(0, 1) > 0 ?
            null
            : ['id' => mt_rand(1, \App\Models\User::count()), 'nickname' => $faker->name]
    ];
});
