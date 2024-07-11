<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;

// User Management
Route::get('users', [AuthController::class, 'index']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [UserController::class, 'profile']);
    Route::put('profile', [UserController::class, 'updateProfile']);
    Route::get('history', [UserController::class, 'history']);
});

// Destinasi
Route::get('destinations', [DestinationController::class, 'index']);
Route::get('destinations/{destination}', [DestinationController::class, 'show']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('destinations', [DestinationController::class, 'store']);
    Route::put('destinations/{destination}', [DestinationController::class, 'update']);
    Route::delete('destinations/{destination}', [DestinationController::class, 'destroy']);
});

// Maskapai
Route::get('airlines', [AirlineController::class, 'index']);
Route::get('airlines/{airline}', [AirlineController::class, 'show']);
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('airlines', [AirlineController::class, 'store']);
    Route::put('airlines/{airline}', [AirlineController::class, 'update']);
    Route::delete('airlines/{airline}', [AirlineController::class, 'destroy']);
});

// Jadwal Penerbangan
Route::get('flights', [FlightController::class, 'index']);
Route::get('flights/{flight}', [FlightController::class, 'show']);
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('flights', [FlightController::class, 'store']);
    Route::put('flights/{flight}', [FlightController::class, 'update']);
    Route::delete('flights/{flight}', [FlightController::class, 'destroy']);
});

// Pembayaran
Route::middleware('auth:sanctum')->group(function () {
    Route::post('payments', [PaymentController::class, 'store']);
    Route::put('payments/{payment}', [PaymentController::class, 'update']);
    Route::get('payments/{payment}', [PaymentController::class, 'show']);
});

// Booking (should be accessible to authenticated users)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('bookings', [BookingController::class, 'index']);
    Route::get('bookings/{booking}', [BookingController::class, 'show']);
    Route::post('bookings', [BookingController::class, 'store']);
    Route::put('bookings/{booking}', [BookingController::class, 'update']);
    Route::delete('bookings/{booking}', [BookingController::class, 'destroy']);
});

// Admin Routes
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::put('payments/{payment}/confirm', [AdminController::class, 'confirmPayment']);
});



