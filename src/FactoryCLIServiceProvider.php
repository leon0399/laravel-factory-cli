<?php


namespace Leon0399\Laravel\FactoryCLI;


use Illuminate\Support\ServiceProvider;

class FactoryCLIServiceProvider extends ServiceProvider
{
    const APP_KEY = 'factory-cli';

    const CONFIG_PATH = __DIR__ . '/../config/' . self::APP_KEY . '.php';

    const COMMAND_CREATE = 'command.' . self::APP_KEY . '.create';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    public function boot()
    {
        if (function_exists('config_path')) {
            $publishPath = config_path(self::APP_KEY . '.php');
        } else {
            $publishPath = base_path('config/' . self::APP_KEY . '.php');
        }

        $this->publishes([self::CONFIG_PATH => $publishPath], 'config');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(self::CONFIG_PATH, self::APP_KEY);

        $this->app->singleton(
            self::COMMAND_CREATE,
            function ($app) {
                return new Console\FactoryCreateCommand($app['config']);
            }
        );

        $this->commands(
            self::COMMAND_CREATE
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [self::COMMAND_CREATE];
    }

}
