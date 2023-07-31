<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Store;
use Auth;
use App\Models\User;


class StoreController extends Controller
{
    public function index(Request $request)
    {
        $apiKey = env('GOOGLE_PLACES_API_KEY');  // your API key
        $lat = $request->input('lat');  // latitude
        $lon = $request->input('lon');   // longitude
        $reviewCounts = $request->input('review_count');  //review count ranges
        $ratings = $request->input('rating');  // rating ranges
        $search = $request->input('query'); // search words
        
        $details = [];
        $places = [];
        $nextPageToken = null;
        
        // Check if the session has lat and lon
        if ($request->session()->has('lat') && $request->session()->has('lon')) {
            $lat = $request->session()->get('lat');
            $lon = $request->session()->get('lon');
        } else {
            $lat = $request->input('lat');  // latitude
            $lon = $request->input('lon');   // longitude
            $request->session()->put('lat', $lat);
            $request->session()->put('lon', $lon);
        }
        
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
        
        } while ($nextPageToken && count($places) < 30); // Continue while there's a next page token 
        
        
        foreach($places as $place)
        {
            $placeId = $place['place_id'];  // 特定の場所のplace_idを設定
            
            // Google Places APIのURLを構築
            $url = sprintf(
                 "https://maps.googleapis.com/maps/api/place/details/json?place_id=%s&fields=name,formatted_address,opening_hours,geometry/location,rating,user_ratings_total,reviews&language=ja&key=%s",
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
            

            //Stores data acquired via API in database
            $store = Store::firstOrNew(['place_id' => $placeId]);
            $store->name = $detail['name'];
            $store->formatted_address = $detail['formatted_address'];
            $store->opening_hours = isset($detail['opening_hours']['weekday_text']) ? json_encode($detail['opening_hours']['weekday_text']) : null;
            $store->reviews = json_encode($detail['reviews'] ?? []);
            $store->latitude = $detail['latitude'];
            $store->longitude = $detail['longitude'];
            $store->review_count = $detail['user_ratings_total'] ?? 0;
            $store->rating = $detail['rating'] ?? 0;;
            $store->save();
            
            $detail['place_id'] = $store->place_id;
            $details[] = $detail;

        }
  
         //Implementation of a narrowing function
        $reviewCountConditions = $request->input('review_count') ? explode('-', $request->input('review_count')[0]) : null;
        $ratingConditions = $request->input('rating') ? explode('-', $request->input('rating')[0]) : null;

        $filteredDetails = [];

        foreach($details as $detail) {
            $satisfyReviewCountCondition = false;
            $satisfyRatingCondition = false;

            // If the review count condition exists, check if the detail satisfies it
            if($reviewCountConditions) {
                $reviewCount = $detail['user_ratings_total'] ?? 0;
                if($reviewCountConditions[0] <= $reviewCount && $reviewCount <= $reviewCountConditions[1]) {
                    $satisfyReviewCountCondition = true;
                }
            } else {
                $satisfyReviewCountCondition = true;
            }

            // If the rating condition exists, check if the detail satisfies it
            if($ratingConditions) {
                $rating = $detail['rating'] ?? 0;
                if($ratingConditions[0] <= $rating && $rating <= $ratingConditions[1]) {
                    $satisfyRatingCondition = true;
                }
            } else {
                $satisfyRatingCondition = true;
            }

            // If the detail satisfies both conditions, add it to the filtered details
            if($satisfyReviewCountCondition && $satisfyRatingCondition) {
                $filteredDetails[] = $detail;
            }
        }

        // Update the details with the filtered details
        $details = $filteredDetails;

        
        Session::put('details', $details);
        // get current page (use 1 as default)
        $currentPage = LengthAwarePaginator::resolveCurrentPage() ?: 1;
        
        // items per page
        $perPage = 10;
    
        // get item offset
        $offset = ($currentPage * $perPage) - $perPage;
    
         // get details from session.
        $details = Session::get('details');
        
        $detailsPaginator = new LengthAwarePaginator(
        array_slice($details, $perPage * ($request->input('page', 1) - 1), $perPage, true),
        count($details),
        $perPage,
        $request->input('page', 1),
        ['path' => $request->url(), 'query' => $request->query()]
    );
        
        return view('stores/results')->with(['places' => $places, 'details' => $detailsPaginator]);
    }
    
    
    public function updateLocation(Request $request)
    {
        // Validate the new location data
        $validatedData = $request->validate([
            'lat' => 'required|numeric',
            'lon' => 'required|numeric',
        ]);
    
        // Update the session with the new lat and lon
        $request->session()->put('lat', $validatedData['lat']);
        $request->session()->put('lon', $validatedData['lon']);
    
        // Redirect back to the previous page, or to a specific route
        return redirect()->back()->with('message', 'Location updated successfully.');
    }
    
    //add Favorites functions
    public function addFavorite(Request $request)
    {
        $store = Store::find($request->store_id);
        Auth::user()->stores()->attach($store->id);

        return response()->json(['status' => 'success']);
    }

    public function removeFavorite(Request $request)
    {
        $store = Store::find($request->store_id);
        Auth::user()->stores()->detach($store->id);

        if ($request->expectsJson()) {
        return response()->json(['status' => 'success']);
        }
    
        return redirect()->route('favorites');
        }
    
}
