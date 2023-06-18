<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;



class StoreController extends Controller
{
         public function index(Request $request)
    {
       
        $client = new Client();
        $response = $client->request('GET','https://maps.googleapis.com/maps/api/place/textsearch/json', [
            'query' => [
                'query' => $request->input('query'),
                'key' => config('GOOGLE_PLACES_API_KEY'),
            ]
        ]);
        
    
        $store = json_decode($response->getBody()->getContents(), true)['results'] ?? [];
        dd($store);
        return view('stores/results', ['stores' => $store]);
    }
}
