<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function getGeoLocation()
    {
         $api_key = config('app.api_key');
         return view('test')->with(['api_key' => $api_key]);
        /*
        $address="tokyo";
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&key='.$apiKey;
        $response = Http::get($url);
        $data = $response->json();
        dd($data);
        // 必要なデータを取り出す
        if ($response->successful() && $data['status'] === 'OK') {
            $locationData = $data['results'][0]['geometry']['location'];
            dd($locationData);
            return response()->json([
                'status' => 'success',
                'data' => $locationData
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to get location data'
            ], 500);
        }*/
    }
}