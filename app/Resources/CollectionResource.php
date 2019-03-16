<?php

namespace App\Resources;

use Weiwenhao\TreeQL\Resource;

class CollectionResource extends Resource
{
    protected $default = [
        'id',
        'name',
        'avatar',
        'user_id',
        'fans_count',
        'post_count'
    ];

    protected $columns = [
        'id',
        'name',
        'avatar',
        'description',
        'fans_count',
        'post_count',
        'user_id'
    ];

    protected $relations = [];

    protected $meta = [];

    protected $custom = [];
}
