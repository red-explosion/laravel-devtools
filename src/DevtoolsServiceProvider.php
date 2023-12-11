<?php

declare(strict_types=1);

namespace RedExplosion\Devtools;

use Illuminate\Support\ServiceProvider;

class DevtoolsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            path: __DIR__ . '/../config/devtools.php',
            key: 'devtools',
        );
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                paths: [
                    __DIR__ . '/../config/devtools.php' => config_path('devtools.php'),
                ],
                groups: 'devtools-config',
            );
        }
    }
}
