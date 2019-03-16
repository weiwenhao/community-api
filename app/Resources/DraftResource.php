<?php

namespace App\Resources;

use Weiwenhao\TreeQL\Resource;

class DraftResource extends Resource
{
    protected $default = [
        'id',
        'title',
        'post_id',
        'user_id'
    ];

    protected $columns = [
        'id',
        'title',
        'user_id',
        'post_id',
        'content'
    ];
}
