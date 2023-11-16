<?php

namespace ChrisReedIO\OpenAI\SDK;

use ChrisReedIO\OpenAI\SDK\Commands\OpenAiClientCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class OpenAiClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-openai-sdk')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-openai-sdk_table')
            ->hasCommand(OpenAiClientCommand::class);
    }
}
