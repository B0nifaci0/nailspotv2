<?php

use App\Http\Livewire\CourseStatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PruebitasController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\ContactController;
use App\Http\Livewire\TasksUser;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');
Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');
Route::get('curso/{course}', [CourseController::class, 'show'])->name('course.show');
Route::get('lecciones-curso/{course}', CourseStatus::class)->middleware('auth')->name('course.status');
Route::get('tareas/{course}', TasksUser::class)->middleware('auth')->name('course.tasks');


Route::get('competencias', [CompetenceController::class, 'index'])->name('competences.index');
Route::get('competencia/{competence}', [CompetenceController::class, 'show'])->name('competence.show');
Route::get('estatus-competencia/{competence}', [CompetenceController::class, 'status'])->name('competence.status');

Route::post('course/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('course.enrolled');
Route::post('competence/{competence}/enrolled', [CompetenceController::class, 'enrolled'])->middleware('auth')->name('competence.enrolled');

Route::get('pruebitas', [PruebitasController::class, 'index'])->name('pruebitas');
Route::get('nosotros', [NosotrosController::class, 'index'])->name('nosotros');

Route::get('contacto', [ContactController::class, 'index'])->name('contact.index');
Route::post('contacto/save', [ContactController::class, 'store'])->name('contact.store');


Route::get('sitemap.xml', PageController::class)->name('sitemap');
