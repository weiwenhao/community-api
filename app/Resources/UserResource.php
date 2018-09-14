<?php

namespace App\Resources;

use Weiwenhao\Including\Resource;

class UserResource extends Resource
{
    protected $baseColumns = ['id', 'nickname', 'avatar'];

    protected $includeColumns = [];
}
