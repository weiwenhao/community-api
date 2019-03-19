<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostLiker;
use App\Observers\CommentObserver;
use App\Observers\PostLikerObserver;
use App\Observers\PostObserver;
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
