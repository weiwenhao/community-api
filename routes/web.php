<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

});


Route::get('/test', function () {

    /** @var \Illuminate\Database\Eloquent\Collection $users */
//    $users = \App\Models\User::limit(10)->get();
//    $users->map(function ($item) {
//        dd($item->posts());
//    });
//
//    $users->load(['posts' => function ($query) {
//        $query->limit(3);
//    }]);
    $posts = \App\Models\Post::limit(3)->get();
    $posts->map(function ($item) {
        dd($item->comments());
    });
});

