<?php

namespace Meisterguild\LaravelBasicAuth;

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
        $this->mergeConfigFrom(__DIR__ . '/../config/basicauth.php', 'envbasicauth');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // vendor:publish コマンドでconfigディレクトリに追加される
        $this->publishes([__DIR__ . '/../config/basicauth.php' => config_path('envbasicauth.php')]);
    }
}
