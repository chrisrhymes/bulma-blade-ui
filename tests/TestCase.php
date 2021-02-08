<?php


namespace Tests;

use BulmaBladeUi\BulmaBladeUiServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            BulmaBladeUiServiceProvider::class,
        ];
    }
}
