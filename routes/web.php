<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// test
Route::get('/location', [TestController::class, 'getGeoLocation']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
     Route::get('/redirect-after-login', [ProfileController::class, 'after'])->name('profile.after');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/',function(){
    return view('stores/search');
})->name('search');

Route::get('/results',[StoreController::class,'index'])->name('search.results');

Route::get('/posts/create',[PostController::class,'create'])->name('posts.create')->middleware('auth');

Route::post('/posts',[PostController::class,'store']);

Route::get('/posts',[PostController::class,'show'])->name('posts');
// Route::get('/posts',[PostController::class,'show']);
require __DIR__.'/auth.php';
