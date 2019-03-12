<?php

namespace App\Resources;

use Weiwenhao\TreeQL\Resource;

class CommentResource extends Resource
{
    protected $default = ['id', 'content', 'user_id', 'post_id', 'like_count', 'reply_count', 'floor'];

    protected $columns = ['id', 'content', 'user_id', 'post_id', 'like_count', 'reply_count', 'floor'];

    protected $relations = [
        'user',
        'replies' => [
            'resource' => CommentReplyResource::class,
        ]
    ];

    public function loadConstraint($builder, $params)
    {
        isset($params['sort_by']) && $builder->orderBy($params['sort_by'], 'desc');
    }
}
