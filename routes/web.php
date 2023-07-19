<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PostHistoryController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\MyFavoriteController;

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

Route::get('/favorite', [MyFavoriteController::class, 'index'])->name('favorites');

Route::get('posts',[PostController::class,'index'])->name('posts');

Route::get('posts/create',[PostController::class,'create'])->name('posts.create')->middleware('auth');

Route::post('posts',[PostController::class,'store']);

Route::get('posts/history', [PostHistoryController::class,'index'])->name('history')->middleware('auth');

Route::get('posts/{post}/edit',[PostHistoryController::class,'edit']);

Route::put('posts/{post}', [PostHistoryController::class, 'update']);

Route::delete('posts/{post}', [PostHistoryController::class, 'destroy']);


require __DIR__.'/auth.php';
