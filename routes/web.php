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
    $stack = new SplStack();
    dd($stack);
    dd($stack->current());
});
