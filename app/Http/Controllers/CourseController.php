<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Course;
use Illuminate\Http\Request;

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

    #cursos gratuitos
    public function enrolled(Course $course, Request $request)
    {
        $course->students()->attach(auth()->user()->id);

        Sale::create([
            'user_id' => auth()->user()->id,
            'saleable_id' => $course->id,
            'saleable_type' => Course::class,
            'coupon_id' => $request->coupon_id,
            'final_price' => 0
        ]);
        return redirect()->route('course.status', $course);
    }
}
