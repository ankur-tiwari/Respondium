<?php

namespace App\Providers;

use App;
use Config;
use Request;
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
        $this->composerTitleForViews();

        $this->setDatabaseToTestingWhileTesting();

        $this->setMailToLogWhileTesting();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    protected function composerTitleForViews()
    {
        view()->composer('layouts.partials.front.nav', function ($view) {
            if ( ! isset($view->page)) {
                $view->with('page', null);
            }
        });
    }

    protected function setDatabaseToTestingWhileTesting()
    {
        if ( Request::header('host') === 'testing.app' or $this->app->environment('testing') ) {
            Config::set('database.default', 'testing');
        }
    }

    protected function setMailToLogWhileTesting()
    {
        if ($this->app->environment('testing')) {
            Config::set('mail.driver', 'log');
        }
    }
}
