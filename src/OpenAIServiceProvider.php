<?php

namespace ChrisReedIO\OpenAI\SDK;

// use ChrisReedIO\OpenAI\SDK\Commands\OpenAICommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class OpenAIServiceProvider extends PackageServiceProvider
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
            ->hasConfigFile();
            // ->hasViews()
            // ->hasMigration('create_laravel-openai-sdk_table')
            // ->hasCommand(OpenAICommand::class);
    }
}
