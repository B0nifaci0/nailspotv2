<?php

use App\Http\Livewire\InstructorCourses;
use Illuminate\Support\Facades\Route;


Route::redirect('', 'instructor/courses');
Route::get('courses', InstructorCourses::class,)->middleware('can:Leer cursos')->name('courses.index');
