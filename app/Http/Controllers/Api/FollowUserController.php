<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class FollowUserController extends Controller
{
    /**
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function store($userId)
    {
        \Auth::user()->followUsers()->attach($userId);

        return $this->created();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function destroy($userId)
    {
        \Auth::user()->followUser()->detach($userId);

        return $this->noContent();
    }
}
