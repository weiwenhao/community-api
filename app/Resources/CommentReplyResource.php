<?php

namespace App\Resources;

use Weiwenhao\TreeQL\Resource;

class CommentReplyResource extends Resource
{
    protected $default = ['*'];

    protected $columns = ['*'];

    protected $relations = ['user'];
}
