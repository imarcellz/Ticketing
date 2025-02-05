<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('profile.destroy');

    // user
    Route::middleware(['auth'])->get('/user-profile', [UserProfileController::class, 'showProfile'])->name('user.profile');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('admin/dashboard', [HomeController::class, 'index']);
    Route::get('/admin/ticketing', [TicketController::class, 'index'])->name('admin/ticketing');

    // Create
    Route::get('/admin/ticketing/create', [TicketController::class, 'create'])->name('admin/ticketing/create');
    Route::post('/admin/ticketing/save', [TicketController::class, 'save'])->name('admin/ticketing/save');

    // Edit
    Route::get('/admin/ticketing/edit/{id}', [TicketController::class, 'edit'])->name('admin/ticketing/edit');
    Route::put('/admin/ticketing/update/{id}', [TicketController::class, 'update'])->name('admin/ticketing/update');

    // Delete
    Route::get('/admin/ticketing/delete/{id}', [TicketController::class, 'delete'])->name('admin/ticketing/delete');
});

// User
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [TicketController::class, 'userDashboard'])->name('dashboard');
});

require __DIR__ . '/auth.php';
