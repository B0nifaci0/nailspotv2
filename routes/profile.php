<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('seguridad', [ProfileController::class, 'security'])->name('security');
Route::get('delete', [ProfileController::class, 'delete'])->name('delete');
Route::get('cursos', [ProfileController::class, 'courses'])->name('courses');
Route::get('competencias', [ProfileController::class, 'competences'])->name('competences');
Route::get('recursos/{competence}', [ProfileController::class, 'resources'])->name('resources');
Route::post('competence/image/{resource}', [ProfileController::class, 'competenceImage'])->name('competences.image');
Route::post('course/image/{task}', [ProfileController::class, 'courseImage'])->name('courses.image');
Route::get('{course}/tareas', [ProfileController::class, 'tasks'])->name('courses.tasks');
Route::get('tareas/{task}', [ProfileController::class, 'task'])->name('task');

