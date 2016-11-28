<?php

namespace MastahEd\Larapost;

use Illuminate\Support\ServiceProvider;

class LarapostServiceProvider extends ServiceProvider
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
        $this->publishes([
            __DIR__ . '/migrations' => database_path('migrations')], 'migrations');

        $this->app['larapost'] = $this->app->share(function($app) {
            return new Larapost;
        });
    }
}
