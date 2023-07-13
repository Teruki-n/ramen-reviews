<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;



class StoreController extends Controller
{
      public function index(Request $request)
        {
            
            $apiKey = env('GOOGLE_PLACES_API_KEY');  // your API key
            $lat = $request->input('lat');  // latitude
            $lon = $request->input('lon');   // longitude
            $search = "ラーメン".$request->input('query'); // search words
            
            $places = [];
            $nextPageToken = null;
            
            do {
                $url = sprintf(
                    "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=%s,%s&radius=1500&type=restaurant&keyword=%s&language=ja&key=%s",
                    $lat,
                    $lon,
                    urlencode($search),
                    $apiKey
                );
            
                //Expand maximum number of acquisitions
                // If we have a next page token, add it to the URL
                if ($nextPageToken) {
                    $url .= "&pagetoken=" . $nextPageToken;
                }
            
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
            
                $responseArray = json_decode($response, true);
            
                // If the response contains 'results', add them to our places array
                if (isset($responseArray['results'])) {
                    $places = array_merge($places, $responseArray['results']);
                }
            
                // If the response contains 'next_page_token', store it for the next request
                if (isset($responseArray['next_page_token'])) {
                    $nextPageToken = $responseArray['next_page_token'];
                } else {
                    $nextPageToken = null;
                }
            
                // Because of Google's rules, we need to wait a short time before using the next_page_token
                if ($nextPageToken) {
                    usleep(2000000); // wait 2 seconds
                }
            
            } while ($nextPageToken && count($places) < 30); // Continue while there's a next page token and we have less than 30 places
            
            $details = [];
            foreach($places as $place)
            {
                $placeId = $place['place_id'];  // 特定の場所のplace_idを設定
                
                // Google Places APIのURLを構築
                $url = sprintf(
                    "https://maps.googleapis.com/maps/api/place/details/json?place_id=%s&language=ja&key=%s",
                     //"https://maps.googleapis.com/maps/api/place/details/json?place_id=%25s&fields=geometry/location&key=%25s", //座標
                    $placeId,
                    $apiKey
                );
                
                // cURLを使用してAPIリクエストを送信
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
                
                // JSONレスポンスを配列にデコード
                $detail = json_decode($response, true)['result'];
                
                // If the formatted_address key exists in the detail array, apply str_replace to it
                if (isset($detail['formatted_address'])) {
                    $detail['formatted_address'] = str_replace('日本、', '', $detail['formatted_address']);
                }
                
                // add latitude and longitude to each detail
                if (isset($detail['geometry']['location'])) {
                    $detail['latitude'] = $detail['geometry']['location']['lat'];
                    $detail['longitude'] = $detail['geometry']['location']['lng'];
                }
                
                $details[] = $detail;
            }
                        
        
            return view('stores/results')->with(['places' => $places, 'details' => $details]);
        }
}
