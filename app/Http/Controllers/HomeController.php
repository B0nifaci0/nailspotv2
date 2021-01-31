<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {

        $courses = Course::whereStatus(3)
            ->latest('id')
            ->get()->take(8);

        return view('welcome', compact('courses'));
    }
}
