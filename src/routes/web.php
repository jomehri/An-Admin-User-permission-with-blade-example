<?php

use Illuminate\Support\Facades\Route;

/**
 * Laravel Breeze Auth
 */
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
