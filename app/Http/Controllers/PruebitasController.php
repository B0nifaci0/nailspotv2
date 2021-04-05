<?php

namespace App\Http\Controllers;

use App\Models\Course;

class PruebitasController extends Controller
{
    public function index()
    {
        $course = Course::find(4);
        $lessons = $course->lessons()->where('final',1)->count();
        return $lessons;
    }
}
