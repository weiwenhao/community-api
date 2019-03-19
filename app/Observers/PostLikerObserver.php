<?php

namespace App\Observers;

use App\Models\PostLiker;
use Illuminate\Support\Facades\Redis;

class PostLikerObserver
{
    /**
     * @param PostLiker $postLiker
     */
    public function created(PostLiker $postLiker)
    {
        $postLiker->post()->increment('like_count');

        // cache add
        $user = \Auth::user();
        $key = "user_likers:{$user->id}";

        if (Redis::exists($key)) {
            Redis::sadd($key, [$postLiker->post_id]);
        }
    }

    public function deleted(PostLiker $postLiker)
    {
        $postLiker->post()->decrement('like_count');

        // cache remove
        $userId = \Auth::id();
        $key = "user_likers:{$userId}";

        if (Redis::exists($key)) {
            Redis::srem($key, $postLiker->post_id);
        }
    }
}
