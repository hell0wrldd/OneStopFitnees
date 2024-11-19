<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\BookingController;

Route::delete('/classes/{id}', [coachController::class, 'destroy'])->name('classes.destroy');


Route::get('/classes/search', [CoachController::class, 'search'])->name('classes.search');

Route::get('/coach/dashboard/classes', [CoachController::class, 'viewClasses'])->name('coach.dash');



Route::middleware('auth')->get('/my-bookings', [BookingController::class, 'myBookings'])->name('my.bookings');

// Route for viewing the class details (checkout page)
Route::match(['get', 'post'], '/classes/{id}', [BookingController::class, 'showClass'])->name('classes.show')->middleware('auth');


// Route for booking a session
Route::post('/sessions/{sessionId}/book', [BookingController::class, 'bookSession'])->name('sessions.book')->middleware('auth');

// Route for showing the form to edit a session
Route::get('/coach/sessions/{id}/edit', [CoachController::class, 'editSession'])->name('coach.sessions.edit')->middleware('auth');

// Route for handling the form submission to update a session
Route::put('/coach/sessions/{id}', [CoachController::class, 'updateSession'])->name('coach.sessions.update')->middleware('auth');


// Route for fetching all classes
Route::get('/coach/classes', [CoachController::class, 'index'])->name('coach.classes');

// Route for booking a session
Route::resource('coaches', CoachController::class);

// Route for viewing the coach dashboard
Route::get('/coach/dashboard', [CoachController::class, 'view'])->name('coach.dashboard');

// Route for showing the form to create a new session
Route::get('/coach/sessions/create', [CoachController::class, 'create'])->name('coach.sessions.create');

// Route for handling the form submission to create a new session
Route::post('coach/save', [App\Http\Controllers\CoachController::class, 'save']);

// Route for showing the form to create a new coach
Route::get('/coach/create', [CoachController::class, 'create'])->name('coach.create');

// Route for handling the form submission to create a new coach
Route::post('/coach', [CoachController::class, 'store'])->name('coach.store');

// Admin Routes
Route::get('admin/users', [AdminController::class, 'loadAllUsers'])->name('admin.users');

Route::delete('admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');


Route::get('profile/show', [App\Http\Controllers\ProfileController::class, 'view']);

// Home Route
Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard Route (requires authentication and email verification)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes (only accessible to authenticated users)
Route::middleware('auth')->group(function () {
    // Edit profile: View and edit user profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // Update profile: Save profile changes
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Delete profile: Delete the authenticated user's profile
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include Authentication Routes (Login, Register, etc.)
require __DIR__.'/auth.php';


