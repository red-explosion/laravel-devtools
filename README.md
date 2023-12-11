# Laravel Devtools

[![Latest Version on Packagist](https://img.shields.io/packagist/v/red-explosion/laravel-devtools.svg?style=flat-square)](https://packagist.org/packages/red-explosion/laravel-devtools)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/red-explosion/laravel-devtools/tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/red-explosion/laravel-devtools/actions/workflows/tests.yml?query=branch:main)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/red-explosion/laravel-devtools/coding-standards.yml?label=code%20style&style=flat-square)](https://github.com/red-explosion/laravel-devtools/actions/workflows/coding-standards.yml?query=branch:main)
[![Total Downloads](https://img.shields.io/packagist/dt/red-explosion/laravel-devtools.svg?style=flat-square)](https://packagist.org/packages/red-explosion/laravel-devtools)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require red-explosion/laravel-devtools
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="devtools-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="devtools-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="devtools-views"
```

## Usage

```php
$variable = new RedExplosion\Devtools();
echo $variable->echoPhrase('Hello, Red Explosion!');
```

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
