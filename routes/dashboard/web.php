<?php

use App\Http\Controllers\Dashboard\AdminHomeController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth', 'is_admin']], function() {
    
    // Admin home
    Route::get('/', [AdminHomeController::class, 'index'])->name('home');
});
    


// Route::middleware(['auth', 'is_admin'])->group(function () {
// });

