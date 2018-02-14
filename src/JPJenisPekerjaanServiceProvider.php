<?php

namespace Bantenprov\JPJenisPekerjaan;

use Illuminate\Support\ServiceProvider;
use Bantenprov\JPJenisPekerjaan\Console\Commands\JPJenisPekerjaanCommand;

/**
 * The JPJenisPekerjaanServiceProvider class
 *
 * @package Bantenprov\JPJenisPekerjaan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class JPJenisPekerjaanServiceProvider extends ServiceProvider
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
        // Bootstrap handles
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('jumlah-penduduk-jenis-pekerjaan', function ($app) {
            return new JPJenisPekerjaan;
        });

        $this->app->singleton('command.jumlah-penduduk-jenis-pekerjaan', function ($app) {
            return new JPJenisPekerjaanCommand;
        });

        $this->commands('command.jumlah-penduduk-jenis-pekerjaan');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'jumlah-penduduk-jenis-pekerjaan',
            'command.jumlah-penduduk-jenis-pekerjaan',
        ];
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
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('jumlah-penduduk-jenis-pekerjaan.php');

        $this->mergeConfigFrom($packageConfigPath, 'jumlah-penduduk-jenis-pekerjaan');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'config');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'jumlah-penduduk-jenis-pekerjaan');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/jumlah-penduduk-jenis-pekerjaan'),
        ], 'lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'jumlah-penduduk-jenis-pekerjaan');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/jumlah-penduduk-jenis-pekerjaan'),
        ], 'views');
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
        ], 'jumlah-penduduk-jenis-pekerjaan-assets');
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
        ], 'migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'jumlah-penduduk-jenis-pekerjaan-public');
    }
}
