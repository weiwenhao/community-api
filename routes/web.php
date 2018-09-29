<?php

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Weiwenhao\Including\Exceptions\IteratorBreakException;

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
    Builder::macro('includeSelect', function () {
        dd(get_class_methods($this));
    });

    dd(Post::limit(3)->includeSelect(123)->get()->toArray());
});
