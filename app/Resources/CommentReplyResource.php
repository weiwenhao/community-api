<?php

namespace App\Resources;

use Weiwenhao\Including\Resource;

class CommentReplyResource extends Resource
{
    protected $default = ['*'];

    protected $columns = ['*'];

    protected $relations = ['user'];
}
