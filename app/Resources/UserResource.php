<?php

namespace App\Resources;

use Weiwenhao\Including\Resource;

class UserResource extends Resource
{
    protected $default = ['id', 'nickname', 'avatar'];

    protected $columns = ['id', 'nickname', 'avatar', 'password'];
}
