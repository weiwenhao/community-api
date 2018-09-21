<?php

namespace App\Virtual;

class Recommend extends Virtual
{
    public function posts()
    {
        return Post::whereIn('id', [1, 2, 3]);
    }
}
