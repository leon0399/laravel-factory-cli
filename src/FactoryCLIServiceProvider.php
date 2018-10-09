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

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'command.factory-cli.create',
            function ($app) {
                return new Console\FactoryCreateCommand();
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
