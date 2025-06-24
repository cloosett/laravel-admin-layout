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
        // Публікація шаблонів
        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/layout-package'),
        ], 'layout-views');

        // Публікація assets (css, js)
        $this->publishes([
            __DIR__ . '/resources/assets' => public_path('vendor/layout-package'),
        ], 'layout-assets');

        // Публікація конфігурації
        $this->publishes([
            __DIR__ . '/routes/web.php' => base_path('routes/admin-web.php'),
        ], 'layout-routes');

        // Завантаження шаблонів
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'layout-package');
    }
}
