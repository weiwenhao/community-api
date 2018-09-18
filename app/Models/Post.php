<?php

namespace App\Models;

class Post extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function selectedComments()
    {
        return $this->comments()->where('selected', 1);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
