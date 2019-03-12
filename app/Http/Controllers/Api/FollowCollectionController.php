<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class FollowCollectionController extends Controller
{
    /**
     * @param $collectionId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function store($collectionId)
    {
        \Auth::user()->followCollections()->attach($collectionId);

        return $this->created();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $collectionId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function destroy($collectionId)
    {
        \Auth::user()->followCollections()->detach($collectionId);

        return $this->noContent();
    }
}
