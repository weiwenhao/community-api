<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dynamic extends Model
{
    public function target()
    {
        return $this->morphTo();
    }
}
