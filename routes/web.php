<?php

use App\Http\Controllers\Dashboard\AdminHomeController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pages.home');
});

// Specializations
Route::get('/specializations', [SpecializationController::class, 'index'])->name('user.specialization.index');
Route::get('/specializations/{id}', [SpecializationController::class, 'show'])->name('user.specialization.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profileSettings', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profileSettings', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profileSettings', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard/web.php';

// Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth', 'is_admin']], function() {
    
//     // Admin home
//     Route::get('/', [AdminHomeController::class, 'index'])->name('dashboard.home');
// });

