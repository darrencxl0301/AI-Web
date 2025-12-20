<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\TrainingJobController;

// main page
Route::get('/', function () {
    return view('home');
})->name('home');

// public page
Route::get('/solution', function () {
    return view('solution');
})->name('solution');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// login
Route::get('/login', function () {
    return view('login');
})->name('login');

// platform page
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/data-upload', function () {
    return view('data-upload');
})->name('data-upload');

// Training Jobs with controller
Route::get('/training-jobs', [TrainingJobController::class, 'index'])->name('training-jobs');

Route::get('/model-hub', function () {
    return view('model-hub');
})->name('model-hub');

Route::get('/model-testing', function () {
    return view('model-testing');
})->name('model-testing');

Route::get('/api-integration', function () {
    return view('api-integration');
})->name('api-integration');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

// API Routes
Route::prefix('api')->group(function () {
    // Chat endpoints
    Route::post('/chat', [ChatController::class, 'sendMessage']);
    Route::get('/chat/history', [ChatController::class, 'getHistory']);
    Route::delete('/chat/history', [ChatController::class, 'clearHistory']);
    
    // Training job endpoints
    Route::post('/training-jobs', [TrainingJobController::class, 'store']);
    Route::get('/training-jobs/{job}', [TrainingJobController::class, 'show']);
    Route::post('/training-jobs/{job}/retry', [TrainingJobController::class, 'retry']);
    Route::get('/training-jobs-stats', [TrainingJobController::class, 'getStats']);
});