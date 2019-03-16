<?php

namespace App\Models;

class Draft extends Model
{
    protected $fillable = ['user_id', 'post_id', 'title', 'content'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function published()
    {
        if (!$this->post_id) {
            $post = Post::create([
                'user_id' => $this->user_id,
                'title' => $this->title,
                'content' => $this->content,
                'published_at' => $this->freshTimestampString(),
            ]);

            $this->post_id = $post->id;
            $this->save();
        } else {
            $post = Post::findOrFail($this->post_id);
            $post->title = $this->title;
            $post->content = $this->content;
            $post->save();
        }
    }
}
