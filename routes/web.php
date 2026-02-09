<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\TrainingJobController;
use App\Http\Controllers\ModelHubController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDatasetController;

/*
|--------------------------------------------------------------------------
| 1. Public Routes 
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('home'))->name('home');
Route::get('/solution', fn() => view('solution'))->name('solution');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/contact', fn() => view('contact'))->name('contact');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| 2. User Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // Data Management
    Route::get('/data-upload', [DatasetController::class, 'index'])->name('data-upload');
    Route::post('/datasets/upload', [DatasetController::class, 'upload'])->name('datasets.upload');
    Route::get('/datasets/{dataset}/download', [DatasetController::class, 'download'])->name('datasets.download');

    // Training Jobs (User View)
    Route::get('/training-jobs', [TrainingJobController::class, 'index'])->name('training-jobs.index');
    Route::get('/training-jobs/create', [TrainingJobController::class, 'create'])->name('training-jobs.create');
    Route::post('/training-jobs', [TrainingJobController::class, 'store'])->name('training-jobs.store');

    // Model Hub & Testing
    Route::get('/model-hub', [ModelHubController::class, 'index'])->name('model-hub');
    Route::get('/model-testing', fn() => view('model-testing'))->name('model-testing');
    Route::get('/chat', [ModelHubController::class, 'testing'])->name('chat');
    Route::post('/api/chat', [ChatController::class, 'sendMessage']);

    // Settings
    Route::get('/settings', fn() => view('settings'))->name('settings');
    Route::get('/api-integration', fn() => view('api-integration'))->name('api-integration');
});

/*
|--------------------------------------------------------------------------
| 3. Admin Routes 
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::patch('/training-jobs/{job}/start', [TrainingJobController::class, 'adminStart'])->name('jobs.start');
    Route::patch('/training-jobs/{job}/terminate', [TrainingJobController::class, 'adminTerminate'])->name('jobs.terminate');
    Route::post('/training-jobs/{job}/complete', [TrainingJobController::class, 'adminComplete'])->name('jobs.complete');


    Route::get('/training-jobs/{job}/deploy-lab', [TrainingJobController::class, 'showDeployLab'])->name('jobs.deploy-lab');
    Route::post('/training-jobs/{job}/test', [TrainingJobController::class, 'testInference'])->name('jobs.test');
    Route::post('/training-jobs/{job}/publish', [TrainingJobController::class, 'publish'])->name('jobs.publish');
    
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');

    Route::post('/datasets/{dataset}/update-status', [AdminDatasetController::class, 'updateStatus'])->name('datasets.update-status');

});

/*
|--------------------------------------------------------------------------
| 4. API Endpoints
|--------------------------------------------------------------------------
*/
Route::prefix('api/chat')->middleware(['auth'])->group(function () {
    Route::post('/', [ChatController::class, 'sendMessage']);
    Route::get('/history', [ChatController::class, 'getHistory']);
    Route::delete('/history', [ChatController::class, 'clearHistory']);
});