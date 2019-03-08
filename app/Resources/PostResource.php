<?php

namespace App\Resources;

use Weiwenhao\TreeQL\Resource;

class PostResource extends Resource
{
    protected $default = [
        'id',
        'code',
        'title',
        'description',
        'cover',
        'comment_count',
        'like_count',
        'user_id'
    ];

    protected $columns = [
        'id',
        'code',
        'title',
        'description',
        'cover',
        'read_count',
        'word_count',
        'give_count',
        'comment_count',
        'like_count',
        'user_id',
        'content',
        'selected_at',
        'published_at'
    ];

    protected $relations = [
        'user',
        'comments'
    ];

    protected $meta = [
        'selected_comments'
    ];

    protected $each = ['is_like'];


    public function isLike($item, $params)
    {
        return array_random([true, false]);
    }

    public function selectedComments($params)
    {
        $post = $this->getCollection()->first();

        $comments = $post->selectedComments;

        $resource = CommentResource::make($comments, 'user,replies.user');

        return $resource->getResponseData();
    }
}
