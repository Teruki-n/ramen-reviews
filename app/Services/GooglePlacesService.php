<?php

namespace App\Services;

use GuzzleHttp\Client;

class GooglePlacesService
{
    protected $api_key;
    protected $client;

    public function __construct()
    {
        $this->api_key = config('app.google_places_api_key');
        $this->client = new Client();
    }

    public function getPlaceDetails($placeId)
    {
        $url = "https://maps.googleapis.com/maps/api/place/details/json";
        $params = [
            'query' => [
                'place_id' => $placeId,
                'fields' => 'reviews',
                'key' => $this->api_key,
            ],
        ];
        $response = $this->client->get($url, $params);
        $data = json_decode($response->getBody(), true);

        return $data['result']['reviews'];
    }
}