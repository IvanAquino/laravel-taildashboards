<?php

namespace IvanAquino\LaravelTaildashboards\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \IvanAquino\LaravelTaildashboards\LaravelTaildashboards
 */
class LaravelTaildashboards extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \IvanAquino\LaravelTaildashboards\LaravelTaildashboards::class;
    }
}
