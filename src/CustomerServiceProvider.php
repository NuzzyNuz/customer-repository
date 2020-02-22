<?php


namespace Iyngaran\Customer;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Iyngaran\Customer\Facades\BaseCustomer;

class CustomerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }

        $this->registerResources();
    }

    public function register()
    {
        $this->commands([
            Console\ProcessCommand::class
        ]);
    }

    private function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views','iyngaran');
        $this->registerFacades();
        $this->registerRoutes();

    }

    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__.'/../config/iyngaran.php' => config_path('iyngaran.php'),
        ],'iyngaran-customer-config');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => BaseCustomer::path(),
            'namespace'=> 'Iyngaran\Customer\Http\Controllers',
        ];
    }

    protected function registerFacades()
    {
        $this->app->singleton('BaseCustomer', function ($app) {
            return new \Iyngaran\Customer\BaseCustomer();
        });
    }

}