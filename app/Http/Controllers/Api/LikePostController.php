<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LikePostController extends Controller
{
    /**
     * @param $postId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function store($postId)
    {
        \Auth::user()->likePosts()->attach($postId);

        return $this->created();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $postId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function destroy($postId)
    {
        \Auth::user()->likePosts()->detach($postId);

        return $this->noContent();
    }
}
