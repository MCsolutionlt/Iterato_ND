<?php
/**
 * Created by PhpStorm.
 * User: Mindaugas
 * Date: 2017.10.19
 * Time: 11:09
 */

namespace App\Services\WeatherServices;


class OpenWeatherMap implements WeatherServiceInterface
{
    public function getWeather($api_key = null, $city)
    {
        $weather_url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=' . $api_key . '&units=metric';
        $ch = curl_init($weather_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
        $response = curl_exec($ch);
        curl_close($ch);

        $weather = json_decode($response);

        if ($weather && $weather->cod == 200) {
            return response()->json([
                'city'    => $weather->name,
                'weather' => $weather->weather[0]->description,
                'temp'    => $weather->main->temp,
            ], 200);
        }

        return response()->json([
            'error' => 'Error',
        ], 404);
    }
}