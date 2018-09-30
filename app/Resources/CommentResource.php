<?php

namespace App\Resources;

use Weiwenhao\Including\Resource;

class CommentResource extends Resource
{
    protected $baseColumns = ['id', 'content', 'user_id', 'post_id', 'like_count', 'reply_count', 'floor'];

    protected $includeRelations = [
        'user',
        'replies' => [
            'resource' => CommentReplyResource::class
        ]
    ];
}
