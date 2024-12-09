<?php

use App\Http\Controllers\AffiliatesController;
use App\Http\Controllers\ComissionsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', HomeController::class)->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('affiliates', AffiliatesController::class);
    Route::resource('comissions', ComissionsController::class);
});
