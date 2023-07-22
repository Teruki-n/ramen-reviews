<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Store;

class MyFavoriteController extends Controller
{
    public function index()
    {
        $user = auth()->user(); 
        $favorites = $user->favorites; 

        return view('stores/my-favorite', ['favorites' => $favorites]);
    }
    
    
    // public function add(Request $request)
    // {
    //     $storeId = $request->store_id;

    //     $favorite = new Favorite;
    //     $favorite->user_id = auth()->user()->id;
    //     $favorite->store_id = $storeId;
    //     $favorite->save();

    //     return back();
    // }

    // public function remove(Request $request)
    // {
    //     $storeId = $request->store_id;
        
    //     $favorite = Favorite::where('user_id', auth()->user()->id)
    //     ->where('store_id', $storeId)
    //     ->first();

    //     if($favorite) $favorite->delete();

    //     return back();
    // }
}