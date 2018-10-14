<?php


namespace Leon0399\Laravel\FactoryCLI;


use Illuminate\Support\ServiceProvider;

class FactoryCLIServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    public function boot()
    {
        $configPath = __DIR__ . '/../config/factory-cli.php';
        if (function_exists('config_path')) {
            $publishPath = config_path('factory-cli.php');
        } else {
            $publishPath = base_path('config/factory-cli.php');
        }

        $this->publishes([$configPath => $publishPath], 'config');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/factory-cli.php';
        $this->mergeConfigFrom($configPath, 'factory-cli');

        $this->app->singleton(
            'command.factory-cli.create',
            function ($app) {
                return new Console\FactoryCreateCommand($app['config']);
            }
        );

        $this->commands(
            'command.factory-cli.create'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('command.factory-cli.create');
    }

}
