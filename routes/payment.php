<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;


Route::get('{course}/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::post('{course}/pay', [PaymentController::class, 'pay'])->name('pay');
Route::get('{course}/approved/{coupon?}', [PaymentController::class, 'approved'])->name('approved');
