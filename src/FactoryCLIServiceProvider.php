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
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\FactoryCreateCommand::class,
            ]);
        }
    }
}