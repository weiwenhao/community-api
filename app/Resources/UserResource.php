<?php

namespace App\Resources;

use Weiwenhao\TreeQL\Resource;

class UserResource extends Resource
{
    protected $default = ['id', 'nickname', 'avatar'];

    protected $columns = ['id', 'nickname', 'avatar', 'password'];
}
