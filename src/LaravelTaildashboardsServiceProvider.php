<?php

namespace IvanAquino\LaravelTaildashboards;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use IvanAquino\LaravelTaildashboards\Commands\LaravelTaildashboardsCommand;

class LaravelTaildashboardsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-taildashboards')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-taildashboards_table')
            ->hasCommand(LaravelTaildashboardsCommand::class);
    }
}
