<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider
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
        // For Elastic Search
        $this->app->singleton('Elasticsearch\Client', function() {
            return new \Elasticsearch\Client([
                'hosts' => ['http://localhost:9200']
            ]);
        });

        $this->app->bind('App\Contracts\Search', 'App\Search\Elasticsearch');
    }
}
