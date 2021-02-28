<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Course;
use App\Models\Lesson;

class PruebitasController extends Controller
{
    public $contador = 0;
    public function index()
    {
        $courses = Course::has('saledetails')->get();
        return $courses;
        return view('pruebitas');
    }
}
