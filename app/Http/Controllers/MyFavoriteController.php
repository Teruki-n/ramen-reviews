<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyFavoriteController extends Controller
{
    public function index()
    {
        return view('stores/my-favorite');
    }
}
