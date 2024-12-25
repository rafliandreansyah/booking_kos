<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/orders', [OrdersController::class, 'index'])->name('orders');
Route::get('/find-boarding-houses', [BoardingHouseController::class, 'find'])->name('find');
