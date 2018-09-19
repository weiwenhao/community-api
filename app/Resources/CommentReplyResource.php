<?php

namespace App\Resources;

use Weiwenhao\Including\Resource;

class CommentReplyResource extends Resource
{
    protected $baseColumns = ['*'];

    protected $includeRelations = ['user'];
}
