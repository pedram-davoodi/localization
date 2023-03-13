<?php

namespace PedramDavoodi\Localization\Providers;

use Illuminate\Support\ServiceProvider;
use PedramDavoodi\Localization\Repositories\ConfigLanguageRepository;
use PedramDavoodi\Localization\Services\Localize;

class LocalizationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('LanguageRepositoryInterface' , function (){
            return new ConfigLanguageRepository();
        });

        $this->app->singleton('Localization' , function (){
            return new Localize(app('LanguageRepositoryInterface'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../Migrations');

        $this->publishes([
            __DIR__.'/../Languages' => lang_path(),
            __DIR__.'/../Configs' => config_path(),
        ], 'public');
    }
}
