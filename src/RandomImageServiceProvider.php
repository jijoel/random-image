<?php namespace Jijoel\RandomImage;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application as LaravelApplication;

use Jijoel\RandomImage\RandomImage;


class RandomImageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $source = realpath(__DIR__.'/../css');

        $this->publishes([
            $source => resource_path('assets/vendor/jijoel'),
        ], 'jijoel/random-image');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app['random-image'] = new RandomImage();
    }

}
