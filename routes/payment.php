<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;


Route::get('course/{course}/checkout', [PaymentController::class, 'checkoutCourse'])->name('course.checkout');
Route::get('competence/{competence}/checkout', [PaymentController::class, 'checkoutCompetence'])->name('competence.checkout');

Route::post('course/{course}/pay', [PaymentController::class, 'payCourse'])->name('course.pay');
Route::post('competence/{competence}/pay', [PaymentController::class, 'payCompetence'])->name('competence.pay');

Route::get('course/{course}/approved/{coupon?}', [PaymentController::class, 'approvedCourse'])->name('course.approved');
Route::get('competence/{competence}/approved/{coupon?}', [PaymentController::class, 'approvedCompetence'])->name('competence.approved');
