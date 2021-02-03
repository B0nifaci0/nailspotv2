<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{

    public function index()
    {

        return view('instructor.course.index');
    }

    public function create()
    {
        //
        return view('instructor.course.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Course $course)
    {
        //
        return view('instructor.course.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('instructor.course.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        //
    }

    public function destroy(Course $course)
    {
        //
    }
}
