<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;


Route::post('checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::post('pay', [PaymentController::class, 'pay'])->name('pay');
Route::get('approval', [PaymentController::class, 'approval'])->name('approval');
Route::get('cancelled', [PaymentController::class, 'cancelled'])->name('cancelled');
