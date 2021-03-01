<?php

use App\Http\Livewire\CourseStatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PruebitasController;

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

Route::post('course/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('course.enrolled');
Route::get('estatus-curso/{course}', CourseStatus::class)->middleware('auth')->name('course.status');

Route::get('pruebitas', [PruebitasController::class, 'index'])->name('pruebitas');


Route::get('/perfil/seguridad', [ProfileController::class, 'security'])
    ->name('profile.security');
Route::get('/perfil/delete', [ProfileController::class, 'delete'])
    ->name('profile.delete');
Route::get('/perfil/cursos', [ProfileController::class, 'courses'])
    ->name('profile.courses');

Route::get('perfil/cursos/{course}/tasks', [ProfileController::class, 'tasks'])->name('courses.tasks');

Route::get('perfil/{task}/task', [ProfileController::class, 'task'])->name('task');
