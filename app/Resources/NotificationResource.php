<?php

namespace App\Resources;

use Weiwenhao\TreeQL\Resource;

class NotificationResource extends Resource
{
    protected $default = [
        'id',
        'type',
        'data',
        'read_at',
    ];

    protected $columns = [
        'id',
        'type',
        'data',
        'read_at',
    ];
}
