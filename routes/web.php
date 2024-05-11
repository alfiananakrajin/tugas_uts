<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\tweet\TweetStoreController;
use App\Http\Controllers\tweet\TweetEditController;
use App\Http\Controllers\tweet\TweetUpdateController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/timeline', TimelineController::class)->middleware(['auth', 'verified'])->name('timeline');

Route::post('tweets', [TweetStoreController::class, '__invoke'])->name('tweets.store');
Route::get('tweets/{id}/edit', [TweetEditController::class, '__invoke'])->name('tweets.edit');
Route::put ('tweets/{id}/edit', [TweetUpdateController::class, '__invoke'])->name('tweets.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
