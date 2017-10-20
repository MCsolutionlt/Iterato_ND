<?php

namespace App\Providers;

use App\Services\WeatherServices\OpenWeatherMap;
use App\Services\WeatherServices\YahooWeather;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\WeatherServices\WeatherServiceInterface', function ($app) {
            return new OpenWeatherMap();
        });
    }
}
