<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index');
    }

    public function show(Course $course)
    {
        $this->authorize('published', $course);
        $similares = Course::whereCategoryId($course->category_id)
            ->where('id', '!=', $course->id)
            ->whereStatus(3)
            ->inRandomOrder()
            ->take(5)
            ->get();
        return view('courses.show', compact('course', 'similares'));
    }

    public function enrolled(Course $course)
    {
        $course->students()->attach(auth()->user()->id);
        return redirect()->route('course.status', $course);
    }
}
