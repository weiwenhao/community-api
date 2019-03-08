<?php

namespace App\Models;

use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class CommentReply extends Model
{
    use HasEagerLimit;

    protected $casts = [
        'call_user' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
