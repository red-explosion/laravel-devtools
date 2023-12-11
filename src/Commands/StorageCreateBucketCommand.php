<?php

declare(strict_types=1);

namespace RedExplosion\DevTools\Commands;

use Aws\S3\S3Client;
use Illuminate\Console\Command;

class StorageCreateBucketCommand extends Command
{
    protected $signature = 'storage:create-bucket';

    protected $description = 'Create an S3 bucket';

    protected S3Client $client;

    public function handle(): int
    {
        /** @var string|null $bucketName */
        $bucketName = config(key: 'filesystems.disks.s3.bucket');

        if (!$bucketName) {
            $this->components->error(string: 'You must set the S3 bucket name before running this command!');

            return self::FAILURE;
        }

        $this->client = $this->client();

        if ($this->bucketExists(name: $bucketName)) {
            $this->components->error(string: "S3 bucket [{$bucketName}] already exists!");

            return self::FAILURE;
        }

        $this->createBucket(name: $bucketName);

        $this->components->info(string: "S3 bucket [{$bucketName}] created successfully.");

        return self::SUCCESS;
    }

    protected function client(): S3Client
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

    protected function bucketExists(string $name): bool
    {
        $result = $this->client->listBuckets();

        /** @var array $buckets */
        $buckets = $result['Buckets'];

        return array_search(needle: $name, haystack: array_column(array: $buckets, column_key: 'Name')) !== false;
    }

    protected function createBucket(string $name): void
    {
        $this->client->createBucket([
            'Bucket' => $name,
            'ACL' => 'public-read',
        ]);

        $this->client->putBucketPolicy([
            'Bucket' => $name,
            'Policy' => '{"Version":"2012-10-17","Statement":[{"Sid":"AddPerm","Effect":"Allow","Principal":"*","Action":["s3:GetObject"],"Resource":["arn:aws:s3:::' . $name . '/*"]}]}',
        ]);
    }
}
