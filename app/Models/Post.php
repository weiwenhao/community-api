<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Laravel\Scout\Searchable;

class Post extends Model
{
    protected $guarded = [];

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

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'collection_post');
    }

    public function liker()
    {
        return $this->hasOne(PostLiker::class)->where('user_id', \Auth::id());
    }

    public function notification()
    {
        return $this->morphOne(Notification::class, 'target');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return Arr::only($array, ['title', 'content']);
    }
}
