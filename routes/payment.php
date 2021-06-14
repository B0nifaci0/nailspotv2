<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;


Route::get('course/{course}/checkout', [PaymentController::class, 'checkoutCourse'])->name('course.checkout');
Route::get('competence/{competence}/checkout', [PaymentController::class, 'checkoutCompetence'])->name('competence.checkout');

Route::post('pay', [PaymentController::class, 'pay'])->name('pay');
Route::get('approval', [PaymentController::class, 'approval'])->name('approval');
Route::get('cancelled', [PaymentController::class, 'cancelled'])->name('cancelled');


// Route::post('competence/{competence}/pay', [PaymentController::class, 'payCompetence'])->name('competence.pay');

// Route::get('course/{course}/approved/{coupon?}', [PaymentController::class, 'approvedCourse'])->name('course.approved');
// Route::get('competence/{competence}/approved/{coupon?}', [PaymentController::class, 'approvedCompetence'])->name('competence.approved');
