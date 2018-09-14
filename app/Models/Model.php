<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Weiwenhao\Including\Helpers\ParseSelect;

class Model extends EloquentModel
{
    use ParseSelect;
}
