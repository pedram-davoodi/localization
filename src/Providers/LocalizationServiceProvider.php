<?php

namespace PedramDavoodi\Localization\Providers;

use Illuminate\Support\ServiceProvider;
use PedramDavoodi\Localization\LocalizationManager;
use PedramDavoodi\Localization\Services\Localize;

class LocalizationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register():void
    {
        $this->app->singleton('LocalizationManager', function ($app) {
            return tap(new LocalizationManager(), function ($manager) {
                foreach (config('localization.drivers') as $repository_type => $values) {
                    $manager->addRepository($repository_type , function () use ($repository_type){
                        $repo = "PedramDavoodi\Localization\Repositories\\".$repository_type."LanguageRepository";
                        return new $repo();
                    });
                }
            });
        });


        $this->app->singleton('Localization' , function (){
            return new Localize(app('LocalizationManager'));
        });
    }

    /**
     * Bootstrap services.
     **/
    public function boot(): void
    {
        require_once __DIR__.'/../helper.php';
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../Migrations');

        $this->publishes([
            __DIR__.'/../Languages' => lang_path(),
            __DIR__.'/../Configs' => config_path(),
            __DIR__.'/../Seeders' => database_path('/seeders'),
        ], 'public');
    }
}
