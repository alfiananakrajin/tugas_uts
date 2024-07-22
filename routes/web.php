<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\tweet\TweetStoreController;
use App\Http\Controllers\tweet\TweetUpdateController;
use App\Http\Controllers\tweet\TweetEditController;
use App\Http\Controllers\tweet\TweetDeleteController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/timeline', TimelineController::class)->middleware(['auth', 'verified'])->name('timeline');

Route::post('tweets', [TweetStoreController::class, '__invoke'])->name('tweets.store');
Route::get('tweets/{id}/edit', [TweetEditController::class, '__invoke'])->name('tweets.edit');
Route::delete('/tweets/{tweet}', [TweetDeleteController::class, 'destroy'])->name('tweets.destroy');
Route::put ('tweets/{id}/edit', [TweetUpdateController::class, '__invoke'])->name('tweets.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
