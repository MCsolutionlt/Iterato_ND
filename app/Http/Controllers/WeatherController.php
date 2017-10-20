<?php

namespace App\Http\Controllers;

use App\Services\WeatherServices\WeatherServiceInterface;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        return view('weather');
    }

    public function getServiceInfo(WeatherServiceInterface $weatherService, Request $request)
    {
        if ($request->isMethod('POST')) {
            $api_key = $request->get('api_key');
            $city = $request->get('city');

            $weather = $weatherService->getWeather($api_key, $city);

            return $weather;
        }

        return false;
    }
}
