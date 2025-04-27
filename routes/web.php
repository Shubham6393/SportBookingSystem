<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacilityController as AdminFacilityController;
use App\Http\Controllers\Admin\EquipmentController as AdminEquipmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Authentication routes (provided by Laravel Breeze)
require __DIR__.'/auth.php';

// User routes (protected)
Route::middleware(['auth'])->group(function () {
    // Booking routes
    Route::resource('bookings', BookingController::class);
});

// Admin routes (protected)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Bookings management
    Route::get('/bookings', [DashboardController::class, 'bookings'])->name('bookings.index');
    Route::patch('/bookings/{booking}/status', [DashboardController::class, 'updateBookingStatus'])->name('bookings.status');
    
    // Contact messages
    Route::get('/messages', [DashboardController::class, 'messages'])->name('messages.index');
    Route::delete('/messages/{message}', [DashboardController::class, 'deleteMessage'])->name('messages.delete');
    
    // Facilities management
    Route::resource('facilities', AdminFacilityController::class);
    
    // Equipment management
    Route::resource('equipment', AdminEquipmentController::class);
});
