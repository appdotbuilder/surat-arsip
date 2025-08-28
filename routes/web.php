<?php

use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncomingLetterController;
use App\Http\Controllers\LetterCategoryController;
use App\Http\Controllers\OutgoingLetterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/health-check', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toISOString(),
    ]);
})->name('health-check');

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

// Company profile - accessible to all authenticated users
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Company Profile routes
    Route::get('company-profile', [CompanyProfileController::class, 'index'])->name('company-profile.index');
    Route::get('company-profile/edit', [CompanyProfileController::class, 'edit'])->name('company-profile.edit');
    Route::patch('company-profile', [CompanyProfileController::class, 'update'])->name('company-profile.update');
    
    // Letter management routes
    Route::resource('incoming-letters', IncomingLetterController::class);
    Route::resource('outgoing-letters', OutgoingLetterController::class);
    
    // Letter categories (authorization handled in Form Request classes)
    Route::resource('letter-categories', LetterCategoryController::class);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
