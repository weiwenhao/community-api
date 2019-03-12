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

    public function selectedComments()
    {
        $post = $this->getModel();

        $comments = $post->selectedComments;

        // 这里的操作类似于 $comments->load(['user', 'replies.user'])
        // 但是load可不会帮你管理Column. 因此我们使用Resource来构造
        $commentResource = CommentResource::make($comments, 'user,replies.user');

        // getResponseData既获取CommentResource解析后并构造后的结构数组
        return $commentResource->getResponseData();
    }
}
