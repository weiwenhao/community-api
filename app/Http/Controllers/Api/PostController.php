<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param null $parent
     * @return \Weiwenhao\TreeQL\Resource
     */
    public function index($parent = null)
    {
        $query = $parent ? $parent->posts() : Post::query();

        $posts = $query->columns()->latest()->paginate();

        return PostResource::make($posts);
    }

    /**
     * 推荐帖子
     * @param $post
     * @return \Weiwenhao\TreeQL\Resource
     */
    public function indexOfRecommend($post)
    {
        $collectionIds = $post->collections()->pluck('id');

        $query = Post::whereHas('collections', function ($query) use ($collectionIds) {
            $query->whereIn('collection_id', $collectionIds);
        });

        $posts = $query->columns()->latest()->paginate();

        return PostResource::make($posts);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return \Weiwenhao\TreeQL\Resource
     */
    public function show($post)
    {
        return PostResource::make($post);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
