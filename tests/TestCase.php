<?php

namespace Tests;

use BulmaBladeUi\BulmaBladeUiServiceProvider;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use InteractsWithViews;

    protected function getPackageProviders($app)
    {
        return [
            BulmaBladeUiServiceProvider::class,
        ];
    }
}
