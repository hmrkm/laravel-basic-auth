<?php

namespace Meisterguild\LaravelBasicAuth;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class BasicAuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath($raw = __DIR__ . '/../config/basicauth.php') ?: $raw;

        Log::info($source);

        $this->publishes([$source => config_path('envbasicauth.php')]);

        $this->mergeConfigFrom($source, 'envbasicauth');
    }

    public function provides(): array
    {
        return [
            'envbasicauth',
        ];
    }
}
