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


// 帖子
Route::get('posts', 'PostController@index');
Route::get('posts/{post}', 'PostController@show');
Route::get('posts/{post}/collections', 'CollectionController@index');
Route::get('posts/{post}/recommend-posts', 'PostController@indexOfRecommend');
Route::get('posts/{post}/comments', 'CommentController@index');

// 发布
Route::post('drafts/{draft}/published', 'DraftController@published');
Route::resource('drafts', 'DraftController');

Route::post('comments', 'CommentController@store');


Route::get('users/{user}/posts', 'PostController@index');

Route::post('posts/{post}/likers', 'PostLikerController@store');
Route::delete('posts/{post}/likers', 'PostLikerController@destroy');


/**
 * virtual = hot30/hot7/recommend
 */
Route::get('{virtual}/posts', 'PostController@index');
