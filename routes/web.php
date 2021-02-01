<?php

use App\Http\Livewire\CourseStatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
