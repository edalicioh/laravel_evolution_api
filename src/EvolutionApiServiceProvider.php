<?php

namespace Edalicio\EvolutionApi;

use Illuminate\Support\ServiceProvider;

class EvolutionApiServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/evolution-api.php', 'evolution-api'
        );
    }


    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/evolution-api.php' => config_path('evolution-api.php'),
            ], 'evolution-api-config');
        }
    }
}
