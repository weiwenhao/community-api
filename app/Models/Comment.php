<?php

namespace App\Models;

use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Comment extends Model
{
    use HasEagerLimit;

    protected $fillable = ['content', 'user_id', 'post_id', 'floor', 'selected'];

    public function getLikeCountAttribute()
    {
        return $this->attributes['like_count'] ?? 0;
    }

    public function getReplyCountAttribute()
    {
        return $this->attributes['reply_count'] ?? 0;
    }

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
