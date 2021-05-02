<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Instructor\CoursesStudents;
use App\Http\Controllers\Instructor\TaskController;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Controllers\Instructor\CourseController;
use Illuminate\Routing\RouteGroup;

Route::redirect('', 'courses');

Route::resource('courses', CourseController::class)->names('courses');
Route::group(
    [
        'prefix' => 'courses'
    ],
    function () {
        Route::get('{course}/curriculum', CoursesCurriculum::class)->middleware('can:Actualizar cursos')->name('courses.curriculum');
        Route::get('{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');
        Route::get('{course}/tasks', [CourseController::class, 'tasks'])->name('courses.tasks');
        Route::get('{course}/students', CoursesStudents::class)->middleware('can:Actualizar cursos')->name('courses.students');
        Route::post('{course}/status', [CourseController::class, 'status'])->name('courses.status');
        Route::get('{course}/comments',[CourseController::class,'comments'])->name('courses.comments');  
    }
);


// Route::get('courses/{course}/{student}/tasks', [CourseController::class, 'tasks'])->name('courses.tasks');
// Route::get('courses/tasks/{task}/', [TaskController::class, 'show'])->name('task.show');
// Route::patch('courses/{task}/score', [TaskController::class, 'update'])->name('task.score');
// Route::get('download/task/{task}', [TaskController::class, 'download'])->name('download.tasks');