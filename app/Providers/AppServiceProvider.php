<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Post;
use App\Models\PostLiker;
use App\Models\User;
use App\Observers\CommentObserver;
use App\Observers\PostLikerObserver;
use App\Observers\PostObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Post::observe(PostObserver::class);
        Comment::observe(CommentObserver::class);
        PostLiker::observe(PostLikerObserver::class);


        Relation::morphMap([
            'posts' => Post::class,
            'users' => User::class,
            'comments' => Comment::class,
            'comment_replies' => CommentReply::class
        ]);

        // 格式化为时间戳
        Carbon::serializeUsing(function ($carbon) {
           return $carbon->format('U');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
