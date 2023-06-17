<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;



class StoreController extends Controller
{
         public function index(Request $request)
    {
       
        $client = new Client();
        $response = $client->get('https://maps.googleapis.com/maps/api/place/textsearch/json', [
            'query' => [
                'query' => $request->query('query'),
                'key' => env('GOOGLE_PLACES_API_KEY'),
            ]
        ]);
 

        $store = json_decode($response->getBody()->getContents(), true)['results'] ?? [];
        return view('stores/results', ['stores' => $store]);
    }
}
