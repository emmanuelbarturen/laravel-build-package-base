<?php namespace VendorName\PackageName;

use Illuminate\Support\ServiceProvider;
use VendorName\PackageName\Middlewares\FirstMiddleware;


class PackageNameServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
        $this->loadViewsFrom(__DIR__ . '/views', 'package-name');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');


        # Publishes
        $this->publishes([__DIR__ . '/migrations' => $this->app->databasePath() . '/migrations'], 'migrations');
        $this->publishes([__DIR__ . '/config/packagename.php' => config_path('packagename.php')]);

        # Middleware
        app('router')->aliasMiddleware('name.middleware', FirstMiddleware::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PackageName::class, function () {
            return new PackageName();
        });

        $this->app->alias(PackageName::class, 'packagename');
    }
}
