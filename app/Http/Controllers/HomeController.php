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

        foreach ($courses as $course) {

            if ($course->image) {
                $course->image->url = $this->getS3URL('courses', $course->id);
            }
        }
        return view('welcome', compact('courses'));
    }
}
