<?php

// use App\Http\Controllers\Auth\SocialAuthController as AuthSocialAuthController;

use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\ScheduleController;
// use App\Http\Controllers\SocialAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/schedule',ScheduleController::class)->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);