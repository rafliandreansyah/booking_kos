<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/orders', [OrdersController::class, 'index'])->name('orders');
Route::get('/find', [BoardingHouseController::class, 'find'])->name('find');
Route::get('/find-results', [BoardingHouseController::class, 'findResult'])->name('find.results');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/city/{slug}', [CityController::class, 'show'])->name('city.show');
Route::get('/boarding-house/{slug}', [BoardingHouseController::class, 'show'])->name('boarding-house.detail');
Route::get('/boarding-house/{slug}/rooms', [BoardingHouseController::class, 'rooms'])->name('boarding-house.rooms');
Route::get('/booking/{slug}', [BookingController::class, 'booking'])->name('boarding-house.booking');
Route::get('/booking/{slug}/information', [BookingController::class, 'information'])->name('booking.information');
Route::post('/booking/{slug}/information/save', [BookingController::class, 'saveInformation'])->name('information.save');
Route::get('/booking/{slug}/information/checkout', [BookingController::class, 'checkout'])->name('checkout');
Route::get('/booking/{slug}/payment', [BookingController::class, 'payment'])->name('payment');
Route::get('/payment/success', [BookingController::class, 'success'])->name('booking-success');
