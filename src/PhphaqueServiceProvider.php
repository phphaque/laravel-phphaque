<?php

namespace Phphaque\LaravelPhphaque;

use Illuminate\Support\ServiceProvider;
use Phphaque\LaravelPhphaque\Console\InstallCommand;
use Phphaque\LaravelPhphaque\Services\PhphaqueService;

class PhphaqueServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/phphaque.php', 'phphaque'
        );

        $this->app->singleton('phphaque', function ($app) {
            return new PhphaqueService();
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class
            ]);

            $this->publishes([
                __DIR__.'/../config/phphaque.php' => config_path('phphaque.php'),
                __DIR__.'/../resources/views' => resource_path('views/vendor/phphaque'),
            ], 'phphaque');
        }

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'phphaque');
    }
}