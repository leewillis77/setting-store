<?php

namespace Leewillis77\SettingStore\Providers;

use Illuminate\Support\ServiceProvider as FrameworkServiceProvider;

class ServiceProvider extends FrameworkServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        if (! class_exists('CreateSettingStoreTable')) {
            $this->publishes([
                __DIR__.'/../../database/migrations/create_setting_store_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_setting_store_table.php'),
            ], 'migrations');
        }
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('setting_store', function ($app) {
            return new \Leewillis77\SettingStore\Repositories\SettingStoreRepository();
        });
    }
}
