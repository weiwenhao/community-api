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

Route::get('posts', 'PostController@index');
Route::get('posts/{post}', 'PostController@show');
Route::get('posts/{post}/comments', 'CommentController@index');

Route::get('users/{user}/posts', 'PostController@index');

// 用户行为
Route::post('posts/{post_id}/likes', 'LikePostController@store');
Route::delete('posts/{post_id}/likes', 'LikePostController@destroy');

Route::post('comments/{comment_id}/likes', 'LikeCommentController@store');
Route::delete('comments/{comment_id}/likes', 'LikeCommentController@destroy');

Route::post('collections/{collection_id}/follows', 'FollowCollectionController@store');
Route::delete('collections/{collection_id}/follows', 'FollowCollectionController@destroy');


Route::post('users/{users_id}/follows', 'FollowUserController@store');
Route::delete('users/{user_id}/follows', 'FollowUserController@destroy');

/**
 * virtual = hot30/hot7/recommend
 */
Route::get('{virtual}/posts', 'PostController@index');
