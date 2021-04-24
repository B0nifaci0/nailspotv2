<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Task;

class PruebitasController extends Controller
{
    public function index()
    {
        $calificadas = Task::whereUserId(auth()->user()->id)
            ->whereStatus(2)->get();
        $task = Task::first();
        $lessons = $task->lesson->course->lessons->count();

        dd($calificadas->count() - 1);
        return view('pruebitas', compact('calificadas'));
    }
}
