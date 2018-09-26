<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class LikeCommentController extends Controller
{
    /**
     * @param $commentId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function store($commentId)
    {
        \Auth::user()->likeComments()->attach($commentId);

        return $this->created();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $commentId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function destroy($commentId)
    {
        \Auth::user()->likeComments()->detach($commentId);

        return $this->noContent();
    }
}
