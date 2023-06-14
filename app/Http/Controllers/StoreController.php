<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
         public function index()
    {
        $apiKey = config('services.google.api_key');
        $query = 'restaurants in Tokyo';

        $client = new Client();
        $response = $client->get('https://maps.googleapis.com/maps/api/place/textsearch/json', [
            'query' => [
                'query' => $query,
                'key' => $apiKey,
            ]
        ]);

        $places = json_decode($response->getBody(), true)['results'];

        return view('places', ['places' => $places]);
    }
}
