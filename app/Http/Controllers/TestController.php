<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function place()
    {
        
        $apiKey = env('GOOGLE_PLACES_API_KEY');  // あなたのGoogle Places APIキーを設定
        $lat = 35.730132;  // 緯度を設定
        $lon = 139.708302;  // 経度を設定
        $search = "ラーメン";  // 検索ワードを設定
        
        // Google Places APIのURLを構築
        $url = sprintf(
            "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=%s,%s&radius=1500&type=restaurant&keyword=%s&language=ja&key=%s",
            $lat,
            $lon,
            urlencode($search),
            $apiKey
        );
        
        // cURLを使用してAPIリクエストを送信
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        
        // JSONレスポンスを配列にデコード
        $places = json_decode($response, true)['results'];
        
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
            $details[] = $detail;
        }
        
            dd($details);
            // 結果を出力
            //   foreach ($results['results'] as $place) {
            //         echo "店名: " . $place['name'] . "\n";
            //         echo "住所: " . $place['vicinity'] . "\n";
            //         echo "評価: " . $place['rating'] . "\n";
            //         echo "-----------------------------------------------------\n";
            //     }
             return view('stores/results')->with(['places' => $places, 'details' => $details]);
    }
    
    public function review()
    {
        $apiKey =  env('GOOGLE_PLACES_API_KEY'); // あなたのGoogle Places APIキーを設定
        $placeId = "ChIJF8KBvV6NGGARkwDJfLE1Grw";  // 特定の場所のplace_idを設定
        
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
        $results = json_decode($response, true);
        
        dd($results);
    }
    
    public function photo()
    {
        $apiKey =  env('GOOGLE_PLACES_API_KEY'); // あなたのGoogle Places APIキーを設定
        $photo_reference = "Aaw_FcKnGKOqXQhTO8A49uoDnW6T5jXJ_3eVsT0Oj3V7tlAwzTMzJyqB2BF6JWe30Hvnimt3pHi4fpp4IZwNCu-30QfVFYpzCvYPpefmrk6ciAcJlm3f5JG3niSjInTg-mJtQC_O3rOmP6YFAVRjhBjR_yyUJ9ln-P4t8KmIWd6ytl8WkKWR";  // 特定の場所のplace_idを設定
        
        // Google Places APIのURLを構築
        $url = sprintf(
            //"https://maps.googleapis.com/maps/api/place/details/json?place_id=%s&fields=reviews&key=%s",
            "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=%s&key=%s",
             //"https://maps.googleapis.com/maps/api/place/details/json?place_id=%25s&fields=geometry/location&key=%25s", //座標
            $photo_reference,
            $apiKey
        );
   
        // cURLを使用してAPIリクエストを送信
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        
        // JSONレスポンスを配列にデコード
        $results = json_decode($response, true);
        
        dd($results);
    }
}
