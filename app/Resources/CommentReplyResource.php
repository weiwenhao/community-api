<?php

namespace App\Resources;

use Weiwenhao\TreeQL\Resource;

class CommentReplyResource extends Resource
{
    protected $default = ['id', 'comment_id', 'user_id', 'content', 'call_user'];

    protected $columns = ['id', 'comment_id', 'user_id', 'content', 'call_user'];

    protected $relations = ['user'];

    /**
     * include=...replies(limit:3)...
     *
     * ↓ ↓ ↓
     *
     * $comments->load(['replies' => function ($builder) {
     *      $this->loadConstraint($builder, ['limit' => 3])
     * });
     *
     * ↓ ↓ ↓
     * @param $builder
     * @param array $params
     */
    public function loadConstraint($builder, array $params)
    {
        isset($params['limit']) && $builder->limit($params['limit']);
    }
}
