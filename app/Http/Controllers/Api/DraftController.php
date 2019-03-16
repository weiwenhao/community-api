<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Draft;
use App\Models\Post;
use App\Resources\DraftResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Weiwenhao\TreeQL\Resource
     */
    public function index()
    {
        $drafts = \Auth::user()->drafts()->paginate();

        return DraftResource::make($drafts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Draft $draft
     * @return \Weiwenhao\TreeQL\Resource
     */
    public function show(Draft $draft)
    {
        return DraftResource::make($draft);
    }

    public function published(Draft $draft)
    {
        Validator::make($draft->getAttributes(), [
            'title' => 'required|max:255',
            'content' => 'required'
        ])->validate();

        $draft->published();

        return response(null, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $drafts = Draft::create([
            'user_id' => \Auth::id()
        ]);

        return response(DraftResource::make($drafts), 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Draft $draft
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Draft $draft)
    {
        $draft->update($request->all());

        return response(DraftResource::make($draft), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Draft $draft
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Draft $draft)
    {
        $draft->delete();

        return response(null, 204);
    }
}
