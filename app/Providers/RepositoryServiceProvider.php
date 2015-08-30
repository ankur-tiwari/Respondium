<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\QuestionInterface', 'App\Repositories\Eloquent\Question');

        $this->app->bind('App\Repositories\UserInterface', 'App\Repositories\Eloquent\User');

        $this->app->bind('App\Repositories\CommentInterface', 'App\Repositories\Eloquent\Comment');

        $this->app->bind('App\Repositories\TagInterface', 'App\Repositories\Eloquent\Tag');

        $this->app->bind('App\Repositories\AnswerInterface', 'App\Repositories\Eloquent\Answer');
    }
}
