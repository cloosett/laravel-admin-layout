<?php

namespace Maks\LaravelAdmin;

use Illuminate\Support\ServiceProvider;

class LayoutPackageServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/menu.php','admin-menu');

        $this->publishes([
            __DIR__ . '/config/menu.php' => config_path('admin-menu.php'),
        ], 'admin-config');

        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/layout-package'),
        ], 'layout-views');

        $this->publishes([
            __DIR__ . '/resources/assets' => public_path('vendor/layout-package'),
        ], 'layout-assets');

        $this->publishes([
            __DIR__ . '/routes/web.php' => base_path('routes/admin-web.php'),
        ], 'layout-routes');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'layout-package');
    }
}
