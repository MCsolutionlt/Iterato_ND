# Iterato_ND
Iterato testinė užduotis

Aplikacija pasiekiama http://127.0.0.1:8000/weather jei naudosite php artisan serve
Aplikacijos veikimas kaip ir jūs prašėte.

Nauji failai:
- app\Providers kataloge orų serviso provider'is WeatherServiceProvider.php, kuriame keičiamas orų srvisas (šiuo metu galimi OpenWeatherMap arba YahooWeather)
- app\Services\WeatherServices kataloge sukurti trys failai: WeatherServiceInterface.php, OpenWeatherMap.php, YahooWeather.php
- app\Http\Controllers pridėtas naujas controller'is WeatherController.php
- resources\views kataloge view'as weather.blade.php

Pakoreguoti failai:
- config kataloge app.php
- routes kataloge web.php
