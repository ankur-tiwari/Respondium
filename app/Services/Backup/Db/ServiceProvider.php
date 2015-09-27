<?php

namespace App\Services\Backup\Db;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->bind(
            \App\Services\Backup\Db\SaverInterface::class,
            \App\Services\Backup\Db\Savers\Email::class
        );
    }
}
