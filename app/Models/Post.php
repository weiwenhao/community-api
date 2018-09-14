<?php

namespace App\Models;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
