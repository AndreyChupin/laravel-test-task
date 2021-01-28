<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::resource('users', UserController::class);
Route::resource('orders', OrderController::class);

Route::get('', function () {
    return view('home');
})->name('home');
