<?php


namespace Sankii\App\Providers;


use Illuminate\Support\ServiceProvider;
use Sankii\App\Console\InstallCommands;

class SankiiServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/sankii.php', 'sankii'
        );
    }

    public function boot()
    {
        $this->loadViewsFrom(
            __DIR__.'/../../resources/views', 'sankii'
        );
        $this->loadRoutesFrom(__DIR__.'/../../routes/sankii.php');
        $this->configurePublish();
//        $this->configureRoutes();
        $this->configureCommands();
    }

    public function configurePublish()
    {
        if(! $this->app->runningInConsole()){
            return;
        }
        $this->publishes([
            __DIR__.'../../config/sankii.php'
                => config_path('sankii.php'),
        ], 'sankii-config');
        $this->publishes([
            __DIR__.'/../../resources/views'
                => resource_path('views/vendor/sankii'),
        ], 'sankii-views');
       //Database migrationsları tam olarak kaydetmek gerekiyor.
        $this->publishes([
            __DIR__.'/../../database/migrations/2021_08_18_192011_entities.php'
                => database_path('migrations/2021_08_18_192011_entities.php')
        ]);
        $this->publishes([
            __DIR__.'/../../routes/sankii.php' => base_path('routes/sankii.php'),
        ]);
    }


    public function configureCommands()
    {
        if(! $this->app->runningInConsole())
        {
            return;
        }

        $this->commands([
            InstallCommands::class,
        ]);

    }
}
