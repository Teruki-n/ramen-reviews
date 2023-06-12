<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Store;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchPlacesData(Request $request)
    {
        // Google Places APIのエンドポイントURL
        $url = 'https://maps.googleapis.com/maps/api/place/details/json';

        // APIキー
        $apiKey = 'AIzaSyC_2cZH6KrbvMcagcj6xbfyojbOFBiz14E';

        // リクエストパラメータ（place_idなど）
        $params = [
            'key' => $apiKey,
            'place_id' => 'PLACE_ID',
        ];

        // Guzzle HTTPクライアントを初期化
        $client = new Client();

        // APIリクエストを送信
        $response = $client->get($url, [
            'query' => $params,
        ]);

        // レスポンスをJSON形式で取得
        $data = json_decode($response->getBody());

        // 取得したデータを処理する（必要に応じて）
        // ...

        // ビューにデータを渡す
        return view('stores.results')->with(['store'=>$request->get()]);
    }
}