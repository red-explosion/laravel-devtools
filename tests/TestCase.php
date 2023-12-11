<?php

declare(strict_types=1);

namespace RedExplosion\DevTools\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use RedExplosion\DevTools\DevToolsServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            DevtoolsServiceProvider::class,
        ];
    }
}
