<?php

namespace App\Resources;

use App\Models\Post;
use Illuminate\Support\Facades\Redis;
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
        ],
        'liker' => [
            'resource' => PostLikerResource::class
        ]
    ];

    protected $meta = [
        'selected_comments'
    ];

    protected $custom = [
        'liked'
    ];


    /**
     * @param Post $post
     * @return boolean
     */
    public function liked($post)
    {
        $user = \Auth::user();
        $key = "user_likers:{$user->id}";

        if (!Redis::exists($key)) {
            $likedPostIds = $user->likedPosts()->pluck('posts.id')->toArray();

            Redis::sadd($key, $likedPostIds);
        }

        return (boolean)Redis::sismember($key, $post->id);
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
