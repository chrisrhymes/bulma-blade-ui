<?php

namespace BulmaBladeUi;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\ComponentAttributeBag;

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

        ComponentAttributeBag::macro('getFirstLike', function ($search) {
            $matches = preg_grep("/{$search}/", array_keys($this->attributes));

            if(empty($matches)) {
                return null;
            }

            $key = $matches[0];

            return "{$key}=\"{$this->attributes[$key]}\"";
        });
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/bulma-blade-ui.php', 'bulma-blade-ui'
        );
    }
}
