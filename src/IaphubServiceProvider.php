<?php

namespace Myckhel\Iaphub;

use Illuminate\Support\ServiceProvider;

class IaphubServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->mergeConfigFrom(__DIR__.'/../config/iaphub.php', 'iaphub');

      // Register the service the package provides.
      $this->app->singleton('iaphub', function ($app) {
          return new Iaphub;
      });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['iaphub'];
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'myckhel');
      // $this->loadViewsFrom(__DIR__.'/../resources/views', 'myckhel');
      // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
      // $this->loadRoutesFrom(__DIR__.'/routes.php');

      // Publishing is only necessary when using the CLI.
      if ($this->app->runningInConsole()) {
          $this->bootForConsole();
      }
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/iaphub.php' => config_path('iaphub.php'),
        ], 'iaphub.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/myckhel'),
        ], 'Iaphub.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/myckhel'),
        ], 'Iaphub.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/myckhel'),
        ], 'Iaphub.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
