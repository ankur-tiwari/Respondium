<?php

namespace App\Providers;

use App;
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
        $generator = new \App\Random\Iframes\Generator();

        view()->composer('questions.partials.answerslist', function ($view) use($generator) {
            $view->with('generator', $generator);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('\App\Repositories\QuestionInterface', '\App\Repositories\Eloquent\Question');

        App::bind('\App\Repositories\UserInterface', '\App\Repositories\Eloquent\User');

        App::singleton('\App\Search\Algolia', function() {
            return new \App\Search\Algolia;
        });
    }
}
