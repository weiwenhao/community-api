<?php

namespace App\Resources;

use Weiwenhao\Including\Resource;

class PostResource extends Resource
{
    protected $default = [
        'id',
        'slug',
        'title',
        'description',
        'cover',
        'comment_count',
        'like_count',
        'user_id'
    ];

    protected $columns = [
        'id' => [
            'alias' => 'code'
        ],
        'slug',
        'title',
        'description',
        'cover',
        'comment_count',
        'like_count',
        'user_id',
        'content' => [
            'alias' => 'desc'
        ]
    ];

    protected $relations = [
        'user' => [
            'resource' => UserResource::class,
            'alias' => 'vip'
        ],
        'comments' => [
            'alias' => 'test_comment'
        ]
    ];

    protected $meta = [
        'selected_comments'
    ];

    protected $each = ['is_like'];

    public function isLike($item, $params)
    {
        return array_random([true, false]);
    }

    /*
     * 我只希望也 show方法的时候调用该 include
     * $this->getCollection 未免太不优雅
     *
     */
    public function selectedComments($params)
    {
        $post = $this->getCollection()->first();

        $comments = $post->selectedComments;

        $resource = CommentResource::make($comments, 'user,replies.user');

        return $resource->getResponseData();
    }

}
