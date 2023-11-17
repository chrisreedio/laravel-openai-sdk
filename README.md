# OpenAI integration for Laravel

![Logo](https://user-images.githubusercontent.com/77644584/283772029-f0a76b76-321c-4ad3-acf9-12b6304de379.png)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chrisreedio/laravel-openai-sdk.svg?style=flat-square)](https://packagist.org/packages/chrisreedio/laravel-openai-sdk)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/chrisreedio/laravel-openai-sdk/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/chrisreedio/laravel-openai-sdk/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/chrisreedio/laravel-openai-sdk/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/chrisreedio/laravel-openai-sdk/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/chrisreedio/laravel-openai-sdk.svg?style=flat-square)](https://packagist.org/packages/chrisreedio/laravel-openai-sdk)

This package provides a SDK for the OpenAI API.

> [!NOTE]
> This package is still in development and is not ready for production use. 

It is proudly powered by [Saloon](https://docs.saloon.dev/) by [Sam Carré](https://github.com/Sammyjo20)! 🤠


## Installation

You can install the package via composer:

```bash
composer require chrisreedio/laravel-openai-sdk
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-openai-sdk-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-openai-sdk-config"
```

This is the contents of the published config file:

```php
return [
    'max_per_page' => 100,
    'api_key' => env('OPENAI_API_KEY'),
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-openai-sdk-views"
```

## Usage

```php
use ChrisReedIO\OpenAI\Facades\OpenAI;

// Get a list of all the assistants
$assistants = OpenAI::assistants()->list()->collect()->all();

// or via a Lazy Collection
$assistants = OpenAI::assistants()->list()->collect();
$assistants->each(function ($assistant) {
    // Do something with the assistant
});

// Create a thread
$thread = OpenAI::threads()->create();
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

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Chris Reed](https://github.com/chrisreedio)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
