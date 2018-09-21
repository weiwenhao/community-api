<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * :post = slug
 * include=content,user,selected_comments
 */
Route::resource('posts', 'PostController');
Route::get('users/{user}/posts', 'PostController@index');

Route::get('{virtual}/posts', 'PostController@index');

/**
 * include=?include=user,replies.user
 */
Route::get('posts/{post}/comments', 'CommentController@index');
