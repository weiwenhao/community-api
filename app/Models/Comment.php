<?php

namespace App\Models;

use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Comment extends Model
{
    use HasEagerLimit;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(CommentReply::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
