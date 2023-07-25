<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Store;
use App\Models\Favorite;

class MyFavoriteController extends Controller
{
    public function index()
    {
        $favorites = Auth::user()->stores()->paginate(10);
        foreach($favorites as $favorite){
            $favorite->reviews = json_decode($favorite->reviews, true);
        }
        return view('stores/my-favorite', ['favorites' => $favorites]);
    }
}