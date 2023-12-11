<?php

declare(strict_types=1);

afterEach(function (): void {
    /** @var string|null $bucket */
    $bucket = config(key: 'filesystems.disks.s3.bucket');

    if (!$bucket) {
        return;
    }

    $this->s3Client()->deleteBucket(['Bucket' => $bucket]);
});

it(description: 'creates an S3 bucket', closure: function (): void {
    expect($this->s3Client()->listBuckets()['Buckets'])
        ->toBeEmpty();

    $this->artisan(command: 'storage:create-bucket')
        ->expectsOutputToContain(string: 'S3 bucket [devtools] created successfully.')
        ->assertSuccessful();

    expect($this->s3Client()->listBuckets()['Buckets'])
        ->toHaveCount(count: 1);
});

it(description: 'shows an error if the bucket already exists', closure: function (): void {
    expect($this->s3Client()->listBuckets()['Buckets'])
        ->toBeEmpty();

    $this->artisan(command: 'storage:create-bucket')
        ->expectsOutputToContain(string: 'S3 bucket [devtools] created successfully.')
        ->assertSuccessful();

    expect($this->s3Client()->listBuckets()['Buckets'])
        ->toHaveCount(count: 1);

    $this->artisan(command: 'storage:create-bucket')
        ->expectsOutputToContain(string: 'S3 bucket [devtools] already exists!')
        ->assertFailed();
});

it(description: 'shows an error if the bucket name is not set', closure: function (): void {
    config()->set(key: 'filesystems.disks.s3.bucket', value: null);

    $this->artisan(command: 'storage:create-bucket')
        ->expectsOutputToContain(string: 'You must set the S3 bucket name before running this command!')
        ->assertFailed();

    expect($this->s3Client()->listBuckets()['Buckets'])
        ->toBeEmpty();
});
