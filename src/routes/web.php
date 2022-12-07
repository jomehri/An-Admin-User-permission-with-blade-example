<?php

use Illuminate\Support\Facades\Route;

// TODO @aliJo remove this route
Route::get('/test', function () {
    $userId = 1;
    $user = \App\Models\User::find(1);
    $userAccounts = $user->accounts()->get();

    dump($userAccounts);

    $userAccount = \App\Models\Basic\UserAccount::find(1);
    dump($userAccount->user()->get());
});
/**
 * Laravel Breeze Auth
 */
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
