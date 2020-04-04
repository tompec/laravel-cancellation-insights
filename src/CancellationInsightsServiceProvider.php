<?php

namespace Tompec\CancellationInsights;

use Illuminate\Support\ServiceProvider;
use Tompec\CancellationInsights\Console\Commands\PublishDefaultCancellationReasons;

class CancellationInsightsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('cancellation-insights.php'),
            ], 'config');

            $this->commands([
                PublishDefaultCancellationReasons::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'cancellation-insights');
    }
}
