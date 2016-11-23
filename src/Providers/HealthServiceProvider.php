<?php
namespace Filld\Health\Provider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class HealthServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {

    }


    public function boot()
    {
        Route::get('health', '\Filld\Health\Controllers\HealthController@index');
    }


    public function provides()
    {
        return ['health'];
    }
}
