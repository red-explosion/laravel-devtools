<?php

declare(strict_types=1);

namespace RedExplosion\DevTools;

use Illuminate\Support\ServiceProvider;

class DevToolsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Commands\StorageCreateBucketCommand::class,
        ]);
    }
}
