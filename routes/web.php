<?php

use App\Http\Controllers\Dashboard\AdminHomeController;
use App\Http\Controllers\MentorSessionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pages.home');
})->name('user.home');

// Specializations
Route::get('/specializations', [SpecializationController::class, 'index'])->name('user.specialization.index');
Route::get('/specializations/{id}', [SpecializationController::class, 'show'])->name('user.specialization.show');
// Route::get('/mentors/{id}', [MentorController::class, 'show'])->name('mentors.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profileSettings', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profileSettings', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profileSettings', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Payment 
    Route::get('/payment/checkout/{session_id}', [PaymentController::class, 'createCheckout'])->name('payment.checkout');
    Route::get('/payment/success/{session_id}', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');
    Route::post('/webhooks/stripe', [WebhookController::class, 'handle']);

    // Sessions
    Route::post('/sessions/book/{mentor_id}', [MentorSessionController::class, 'bookSession'])->name('sessions.book');
    Route::get('/sessions/{id}', [MentorSessionController::class, 'show'])->name('sessions.show');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard/web.php';

// Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth', 'is_admin']], function() {
    
//     // Admin home
//     Route::get('/', [AdminHomeController::class, 'index'])->name('dashboard.home');
// });
