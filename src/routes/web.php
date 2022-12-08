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
    ->name('dashboard.payment_request.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('', [DashboardController::class, 'view'])->name('view');
        Route::post('save', [DashboardController::class, 'save'])->name('save');
        Route::post('approve', [DashboardController::class, 'approvePaymentRequest'])->name('approve');
        Route::post('reject', [DashboardController::class, 'rejectPaymentRequest'])->name('reject');
    });


