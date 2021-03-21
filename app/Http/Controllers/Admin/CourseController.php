<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::whereStatus(Course::REVISION)->paginate();
        return view('admin.courses.index', compact('courses'));
    }

    public function sales()
    {
        return view('admin.courses.sales');
    }

    public function details(Course $course)
    {
        return view('admin.courses.details', compact('course'));
    }

    public function show(Course $course)
    {
        $this->authorize('revision', $course);
        return view('admin.courses.show', compact('course'));
    }

    public function approved(Course $course)
    {
        $this->authorize('revision', $course);

        if (!$course->lessons || !$course->goals || !$course->requirements || !$course->image) {
            return back()->with('info', "Curso incompleto");
        }
        $course->status = 3;
        $course->save();

        return redirect()->route('admin.courses.index')->with('info', "Curso Publicado");;
    }
}
