<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostLiker;
use Illuminate\Http\Response;

class PostLikerController extends Controller
{
    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function store(Post $post)
    {
        $postLiker = new PostLiker();
        $postLiker->user_id = \Auth::id();
        $postLiker->post()->associate($post);
        $postLiker->save();

        return $this->created();
    }


    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function destroy(Post $post)
    {
        $postLiker = PostLiker::where('user_id', \Auth::id())
            ->where('post_id', $post->id)
            ->firstOrFail();

        // Observer 中需要用到该关联,防止重复查询
        $postLiker->setRelation('post', $post);

        $postLiker->delete();

        return $this->noContent();
    }
}
