<?php

use App\Http\Controllers\Dashboard\AdminHomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pages.home');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard/web.php';

// Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth', 'is_admin']], function() {
    
//     // Admin home
//     Route::get('/', [AdminHomeController::class, 'index'])->name('dashboard.home');
// });

