<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Resources\CommentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param null $parent
     * @return \Weiwenhao\TreeQL\Resource
     */
    public function index($parent = null)
    {
        $query = $parent ? $parent->comments() : Comment::query();
        $comments = $query->columns()->latest()->paginate();

        return CommentResource::make($comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::id();
        $comment = Comment::create($data);

        return \response(CommentResource::make($comment), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return \response(null, 204);
    }
}
