<?php

namespace BulmaBladeUi;

use Illuminate\Support\ServiceProvider;

class BulmaBladeUiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/bulma-blade-ui.php' => config_path('bulma-blade-ui.php'),
        ]);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'bbui');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/bbui'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/bulma-blade-ui.php', 'bulma-blade-ui'
        );
    }
}
