<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CriterionController;
use App\Http\Controllers\Admin\CompetenceController;
use App\Http\Controllers\Admin\CompetenceCriterionController;
use App\Http\Controllers\Admin\SubcategoryController;

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');

Route::resource('roles', RoleController::class)->names('roles');
Route::resource('users', UserController::class)->names('users')->only(['index', 'edit', 'update']);
Route::resource('categories', CategoryController::class)->names('categories');
Route::resource('subcategories', SubcategoryController::class)->names('subcategories');
Route::resource('levels', LevelController::class)->names('levels');
Route::resource('coupons', CouponController::class)->names('coupons');
Route::resource('competences', CompetenceController::class)->names('competences');
Route::resource('criteria', CriterionController::class)->names('criteria');


Route::get('sales', [CourseController::class, 'sales'])->name('sales');
Route::get('sales/details/{course}', [CourseController::class, 'details'])->name('details');
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');

Route::get('competences/{competence}/judges', [CompetenceController::class, 'indexCriteria'])->name('competences.index-criteria');
Route::post('competences/assign-judge', [CompetenceController::class, 'assignJudge'])->name('competences.assign-judge');

Route::delete('competences/{criterion}', [CompetenceController::class, 'deleteCriteria'])->name('competences.destroycriteria');
