# laravel-taildashboards

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ivanaquino/laravel-taildashboards.svg?style=flat-square)](https://packagist.org/packages/ivanaquino/laravel-taildashboards)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ivanaquino/laravel-taildashboards/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ivanaquino/laravel-taildashboards/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ivanaquino/laravel-taildashboards/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ivanaquino/laravel-taildashboards/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ivanaquino/laravel-taildashboards.svg?style=flat-square)](https://packagist.org/packages/ivanaquino/laravel-taildashboards)

This Laravel package provides an effortless way to implement beautiful and responsive dashboard templates from [Taildashboards](https://taildashboards.com). Taildashboards offers a collection of pre-designed templates built with Tailwind CSS, and this package helps you to incorporate them into your Laravel application with ease.This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require ivanaquino/laravel-taildashboards
```

You need tailwind installation on your laravel, if you're using jetstream or breeze you have it installed but if not you can follow the [official tailwindcss guide](https://tailwindcss.com/docs/guides/laravel)

If you're having problems with broken styles you can add this line into tailwind.config.js

```json
content: [
    // ...
    './vendor/ivanaquino/laravel-taildashboards/resources/views/**/*.blade.php',
    // ...
]
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="taildashboards-config"
```

In this file you'll be able to edit the menu for the dashboard

```php
'menu' => [
    [
        'label' => 'Dashboard',
        'route' => 'dashboard',
        'active_route' => 'dashboard',
        'icon' => 'home',
    ],
    [
        'label' => 'View 1',
        'route' => 'view-1',
        'active_route' => 'view-1',
        'icon' => 'circle',
    ],
    [
        'label' => 'View 2',
        'route' => 'view-2',
        'active_route' => 'view-2',
        'icon' => 'home',
    ],
],
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-taildashboards-views"
```

## Usage

```php
# As blade layout
@extends('laravel-taildashboards::layouts.tailapp')

@section('content')
    Lorem ipsum dolor sit amet consectetur adipisicing elit.
@endsection

# Or as a component layout
<x-laravel-taildashboards::layout-tailapp>
    Lorem, ipsum dolor sit amet consectetur
</x-laravel-taildashboards::layout-tailapp>
```

# Roadmap
- [x] [TailApp](https://taildashboards.com/get/tailapp)
- [ ] [TailTube](https://taildashboards.com/get/tailtube)
- [ ] [TailFlix](https://taildashboards.com/get/tailflix)
- [ ] [TailLism](https://taildashboards.com/get/tailism)
- [ ] [TailAdmin](https://taildashboards.com/get/tailadmin)
- [ ] [TailSocial](https://taildashboards.com/get/tailsocial)
- [ ] Test suit

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ivan Aquino](https://github.com/IvanAquino)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
