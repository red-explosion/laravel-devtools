<?php

declare(strict_types=1);

namespace RedExplosion\DevTools\Tests;

use Aws\S3\S3Client;
use Illuminate\Config\Repository;
use Orchestra\Testbench\TestCase as Orchestra;
use RedExplosion\DevTools\DevToolsServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            DevToolsServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        tap($app['config'], function (Repository $config): void {
            $config->set(key: 'filesystems.disks.s3.key', value: 'minio');
            $config->set(key: 'filesystems.disks.s3.secret', value: 'password');
            $config->set(key: 'filesystems.disks.s3.region', value: 'us-east-1');
            $config->set(key: 'filesystems.disks.s3.bucket', value: 'devtools');
            $config->set(key: 'filesystems.disks.s3.endpoint', value: 'http://localhost:9000');
            $config->set(key: 'filesystems.disks.s3.use_path_style_endpoint', value: true);
        });
    }

    public function s3Client(): S3Client
    {
        return new S3Client([
            'credentials' => [
                'key' => config(key: 'filesystems.disks.s3.key'),
                'secret' => config(key: 'filesystems.disks.s3.secret'),
            ],
            'region' => config(key: 'filesystems.disks.s3.region'),
            'version' => 'latest',
            'endpoint' => config(key: 'filesystems.disks.s3.endpoint'),
            'use_path_style_endpoint' => config(key: 'filesystems.disks.s3.use_path_style_endpoint'),
        ]);
    }
}
