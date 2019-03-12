<?php

namespace App\Resources;

use Weiwenhao\TreeQL\Resource;

class PostResource extends Resource
{
    protected $default = [
        'id',
        'title',
        'description',
        'cover',
        'comment_count',
        'like_count',
        'user_id'
    ];

    protected $columns = [
        'id',
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
        'comments' => [
            'resource' => CommentResource::class,
        ]
    ];

    protected $meta = [
        'selected_comments'
    ];

    protected $custom = [
        'liked'
    ];


    /**
     * @param $item
     * @param $params
     * @return mixed
     */
    public function liked($item, $params)
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
