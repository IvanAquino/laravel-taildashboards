<?php

namespace IvanAquino\LaravelTaildashboards\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use IvanAquino\LaravelTaildashboards\LaravelTaildashboardsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'IvanAquino\\LaravelTaildashboards\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelTaildashboardsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-taildashboards_table.php.stub';
        $migration->up();
        */
    }
}
