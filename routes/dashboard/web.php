<?php

use App\Http\Controllers\Dashboard\AdminHomeController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\MenteeController;
use App\Http\Controllers\Dashboard\MentorController;
use App\Http\Controllers\Dashboard\SkillController;
use App\Http\Controllers\Dashboard\SpecializationController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth', 'is_admin']], function() {
    
    // Admin home
    Route::get('/', [AdminHomeController::class, 'index'])->name('home');

    // Skills Routes as resources 
    Route::resource('skills', SkillController::class)->parameters(['skills' => 'id']);

    // Specializations Routes as resources 
    Route::resource('specializations', SpecializationController::class)->parameters(['specializations' => 'id']);

    // Admins Routes as resources 
    Route::resource('admins', AdminController::class)->parameters(['admins' => 'id']);

    // Mentors Routes as resources 
    Route::resource('mentors', MentorController::class)->parameters(['mentors' => 'id']);

    // Mentors Routes as resources 
    Route::resource('mentees', MenteeController::class)->parameters(['mentees' => 'id']);



});
    


// Route::middleware(['auth', 'is_admin'])->group(function () {
// });

