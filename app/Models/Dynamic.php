<?php

namespace App\Models;

class Dynamic extends Model
{
    public function target()
    {
        return $this->morphTo();
    }
}
