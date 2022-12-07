<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/**
 * Laravel Breeze Auth
 */
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
