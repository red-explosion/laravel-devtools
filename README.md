# Laravel DevTools

[![Latest Version on Packagist](https://img.shields.io/packagist/v/red-explosion/laravel-devtools.svg?style=flat-square)](https://packagist.org/packages/red-explosion/laravel-devtools)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/red-explosion/laravel-devtools/tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/red-explosion/laravel-devtools/actions/workflows/tests.yml?query=branch:main)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/red-explosion/laravel-devtools/coding-standards.yml?label=code%20style&style=flat-square)](https://github.com/red-explosion/laravel-devtools/actions/workflows/coding-standards.yml?query=branch:main)
[![Total Downloads](https://img.shields.io/packagist/dt/red-explosion/laravel-devtools.svg?style=flat-square)](https://packagist.org/packages/red-explosion/laravel-devtools)

A collection of helpful tools for building Laravel projects.

## Installation

To get started, install Laravel DevTools via the Composer package manager:

```bash
composer require red-explosion/laravel-devtools --dev
```

## Usage

### Creating an S3 bucket

Most of our projects use MinIO during local development to replicate and S3 bucket. When setting up projects for the
first time, you will often find yourself needing to create a bucket in MinIO. This package provides a helpful command
to create the bucket automatically with the correct permissions.

```shell
php artisan storage:create-bucket
```

> [!IMPORTANT]
> You will need to ensure you have configured your `AWS_` environment variables before running this command.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

If you discover a security vulnerability, please send an e-mail to Ben Sherred via ben@redexplosion.co.uk. All security
vulnerabilities will be promptly addressed.

## Credits

- [Ben Sherred](https://github.com/bensherred)
- [All Contributors](../../contributors)

## License

Laravel Devtools is open-sourced software licensed under the [MIT license](LICENSE.md).
