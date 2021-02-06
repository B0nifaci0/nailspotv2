<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;


Route::get('{course}/checkout', [PaymentController::class, 'checkout'])->name('checkout');
