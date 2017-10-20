<?php
/**
 * Created by PhpStorm.
 * User: Mindaugas
 * Date: 2017.10.19
 * Time: 11:05
 */

namespace App\Services\WeatherServices;


interface WeatherServiceInterface
{
    public function getWeather($api_key = null, $city);
}