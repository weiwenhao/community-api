<?php

namespace App\Resources;

use App\Models\Post;
use Illuminate\Support\Facades\Redis;
use Weiwenhao\TreeQL\Resource;

class PostLikerResource extends Resource
{
    protected $default = [
        'id',
        'user_id',
        'post_id'
    ];

    protected $columns = [
        'id',
        'user_id',
        'post_id'
    ];

    protected $relations = [];

    protected $meta = [];

    protected $custom = [];
}
