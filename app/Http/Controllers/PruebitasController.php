<?php

namespace App\Http\Controllers;

use App\Models\Course;

class PruebitasController extends Controller
{
    public function index()
    {
        $course = Course::find(8);
        $taskUser = $course->tasks()
            ->with('taskUser')
            ->get()
            ->pluck('taskUser')
            ->collapse()
            ->where('user_id', auth()->user()->id)
            ->where('score', '!=', null);
        // ->count();
        return $taskUser;

        return view('certificado');
    }
}
