<?php

namespace App\Models;

class Collection extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'collection_post');
    }
}
