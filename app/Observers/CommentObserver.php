<?php

namespace App\Observers;

use App\Models\Comment;

class CommentObserver
{
    public function created(Comment $comment)
    {
        $comment->post()->increment('comment_count');
    }

    public function deleted(Comment $comment)
    {
        $comment->post()->increment('comment_count');
    }
}
