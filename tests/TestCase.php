<?php

declare(strict_types=1);

namespace RedExplosion\Devtools\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use RedExplosion\Devtools\DevtoolsServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            DevtoolsServiceProvider::class,
        ];
    }
}
