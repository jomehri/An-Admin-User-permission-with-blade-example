<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;

/**
 * Auth routes
 */
require __DIR__ . '/auth.php';

/**
 * Default home route
 */
Route::get('/', function () {
    return redirect('dashboard');
});

/**
 * Dashboard Routes
 */
Route::prefix('dashboard/')
    ->name('dashboard.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('', [DashboardController::class, 'view'])->name('view');
        Route::post('save', [DashboardController::class, 'save'])->name('save');
    });


