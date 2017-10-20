<?php
/**
 * Created by PhpStorm.
 * User: Mindaugas
 * Date: 2017.10.19
 * Time: 11:09
 */

namespace App\Services\WeatherServices;


class YahooWeather implements WeatherServiceInterface
{
    public function getWeather($api_key = null, $city)
    {
        $yql_query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="' . $city . '") and u="c"';
        $weather_url = 'http://query.yahooapis.com/v1/public/yql?q=' . urlencode($yql_query) . '&format=json';
        $ch = curl_init($weather_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
        $response = curl_exec($ch);
        curl_close($ch);

        $weather = json_decode($response);

        if ($weather && $weather->query->results) {
            return response()->json([
                'city'    => $weather->query->results->channel->location->city,
                'weather' => $weather->query->results->channel->item->condition->text,
                'temp'    => $weather->query->results->channel->item->condition->temp,
            ], 200);
        }

        return response()->json([
            'error' => 'Error',
        ], 404);
    }
}