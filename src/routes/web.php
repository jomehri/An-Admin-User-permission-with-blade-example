<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;

/**
 * Auth routes & default home
 */
require __DIR__ . '/auth.php';
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

        /**
         * Send payment requests
         */
        Route::get('', [DashboardController::class, 'view'])->name('view');
        Route::post('save', [DashboardController::class, 'save'])->name('save');

        /**
         * Moderate payment requests
         */
        Route::get('approve/{paymentRequest}', [DashboardController::class, 'approvePaymentRequest'])->name('approve');
        Route::get('reject/{paymentRequest}', [DashboardController::class, 'rejectPaymentRequest'])->name('reject');

    });


