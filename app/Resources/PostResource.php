<?php

namespace App\Resources;

use Weiwenhao\Including\Resource;

class PostResource extends Resource
{
    protected $baseColumns = ['id', 'slug', 'title', 'description', 'cover', 'comment_count', 'like_count', 'user_id'];

    protected $includeColumns = ['content'];

    protected $includeRelations = ['user'];

    protected $includeMeta = ['selected_comments'];

    public function selectedComments()
    {
        $post = $this->getCollection()->first();

        return $post->selectedComments;
    }
}
