<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{
    /**
     * @param Post $post
     */
    public function saving(Post $post)
    {
        if ($post->isDirty(['like_count', 'read_count'])) {
            $heat = 0.001 * ($post->created_at->timestamp - 1546300800) + 10 * $post->read_count + 1000 * $post->like_count;
            $post->heat = (integer) $heat;
        }
    }
}
