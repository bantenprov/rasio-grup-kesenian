<?php

namespace Bantenprov\RasioGrupKesenian;

use Illuminate\Support\ServiceProvider;
use Bantenprov\RasioGrupKesenian\Console\Commands\RasioGrupKesenianCommand;

/**
 * The RasioGrupKesenianServiceProvider class
 *
 * @package Bantenprov\RasioGrupKesenian
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RasioGrupKesenianServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
        $this->seedHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('rasio-grup-kesenian', function ($app) {
            return new RasioGrupKesenian;
        });

        $this->app->singleton('command.rasio-grup-kesenian', function ($app) {
            return new RasioGrupKesenianCommand;
        });

        $this->commands('command.rasio-grup-kesenian');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'rasio-grup-kesenian',
            'command.rasio-grup-kesenian',
        ];
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('rasio-grup-kesenian.php');

        $this->mergeConfigFrom($packageConfigPath, 'rasio-grup-kesenian');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'rasio-grup-kesenian-config');
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'rasio-grup-kesenian');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/rasio-grup-kesenian'),
        ], 'rasio-grup-kesenian-lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'rasio-grup-kesenian');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/rasio-grup-kesenian'),
        ], 'rasio-grup-kesenian-views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'rasio-grup-kesenian-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'rasio-grup-kesenian-migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'rasio-grup-kesenian-public');
    }

    public function seedHandle()
    {
        $packageSeedPath = __DIR__.'/database/seeds';

        $this->publishes([
            $packageSeedPath => base_path('database/seeds')
        ], 'rasio-grup-kesenian-seeds');
    }
}
