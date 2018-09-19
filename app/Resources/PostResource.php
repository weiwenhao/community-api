<?php

namespace App\Resources;

use Weiwenhao\Including\Resource;

class PostResource extends Resource
{
    protected $baseColumns = ['id', 'slug', 'title', 'description', 'cover', 'comment_count', 'like_count', 'user_id'];

    protected $includeColumns = ['content'];

    protected $includeRelations = ['user'];

    protected $includeMeta = ['selected_comments'];

    /*
     * 我只希望也 show方法的时候调用该 include
     * $this->getCollection 未免太不优雅
     *
     */
    public function selectedComments()
    {
        $post = clone $this->getCollection()->first();

        $comments = $post->selectedComments;

        $resource = CommentResource::make($comments, 'user,replies.user');

        return $resource->getData();
    }
}
