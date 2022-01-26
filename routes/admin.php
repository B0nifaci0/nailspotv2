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
use App\Http\Controllers\Admin\CompetenceRequirementController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\NosotroController;
use App\Http\Controllers\Admin\SubcompetenceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Report\DetailsCourseController;
use App\Http\Controllers\Report\TableCompetencesController;
use App\Models\Subcompetence;

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');

Route::resource('roles', RoleController::class)->names('roles');
Route::resource('users', UserController::class)->names('users')->only(['index', 'edit', 'update']);
Route::resource('categories', CategoryController::class)->names('categories');
Route::resource('subcategories', SubcategoryController::class)->names('subcategories');
Route::resource('levels', LevelController::class)->names('levels');
Route::resource('coupons', CouponController::class)->names('coupons');
Route::resource('competences', CompetenceController::class)->names('competences');
Route::resource('criteria', CriterionController::class)->names('criteria');
Route::resource('nosotros', NosotroController::class)->names('nosotros');
Route::resource('competences/{competence}/{category}/subcompetences', SubcompetenceController::class)->names('subcompetences');

Route::get('sales/courses', [CourseController::class, 'sales'])->name('sales.courses');
Route::get('sales/course/{course}', [CourseController::class, 'details'])->name('sales.courses.details');
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');
Route::post('courses/disapproved', [CourseController::class, 'disapproved'])->name('courses.disapproved');

Route::post('{id}/paid', [CourseController::class, 'paid'])->name('course.paid');


Route::get('competences/{competence}/{category}/{subcompetence}/judges', [SubcompetenceController::class, 'indexCriteria'])->name('subcompetences.index-criteria');
Route::post('competences/{competence}/{category}/{subcompetence}/assign-judge', [SubcompetenceController::class, 'assignJudge'])->name('subcompetences.assign-judge');

Route::get('competences/{competence}/requirements', [CompetenceRequirementController::class, 'index'])->name('competences.requirements.index');
Route::post('competences/new-requirements', [CompetenceRequirementController::class, 'store'])->name('competences.requirements.store');
Route::delete('competences/requirements/{requirement}', [CompetenceRequirementController::class, 'destroy'])->name('competences.requirements.destroy');

Route::post('{competence}/publish', [CompetenceController::class, 'publish'])->name('publish');
Route::get('sales/competences', [CompetenceController::class, 'sales'])->name('sales.competences');
Route::get('sales/competence/{competence}', [CompetenceController::class, 'details'])->name('sales.competences.details');

Route::get('competences/{competence}/categories', [CompetenceController::class, 'indexCategories'])->name('competence.categories.index');
Route::get('competences/{competence}/categories/{category}', [CompetenceController::class, 'destroyCategory'])->name('competence.categories.delete');

Route::delete('competences/criterion/{id}/delete', [CompetenceController::class, 'destroyCriteria'])->name('competences.criteria.destroy');

Route::get('report/{competence}/score', TableCompetencesController::class)->name('reports.competences.score');
Route::get('report/{course}/details', [DetailsCourseController::class, 'generalReport'])->name('reports.course.details');
Route::post('report/{course}/details/specifict/', [DetailsCourseController::class, 'specificRepot'])->name('reports.course.details.specifict');

Route::get('mensajes', [ContactController::class, 'indexAdmin'])->name('message.index')->middleware('auth');
Route::get('mensajes/contacto/{contact}', [ContactController::class, 'editAdmin'])->name('message.contact.edit')->middleware('auth');
Route::patch('mensajes/contacto/{contact}/update', [ContactController::class, 'update'])->name('message.contact.update')->middleware('auth');
Route::delete('mensajes/{message}/delete', [ContactController::class, 'destroy'])->name('message.delete')->middleware('auth');

Route::get('/selectWinner/{competence}', [CompetenceController::class, 'selectWinner'])->name('select.winner')->middleware('auth');
