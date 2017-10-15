<?php
namespace Filld\Health\Providers;

use Illuminate\Support\ServiceProvider;

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
        $router = $this->app;

        preg_match('/\(\d\.\d\.\d\)/', app()->version(), $matches);

        if (!empty($matches[0]))
        {
            $version = intval(str_replace(['.', '(', ')'], '', $matches[0]));
            if ($version > 550)
            {
                $router = $this->app->router;
            }
        }

        $router->get('health', '\Filld\Health\Controllers\HealthController@index');
    }


    public function provides()
    {
        return ['health'];
    }
}
