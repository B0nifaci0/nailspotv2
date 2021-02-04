<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Level;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{

    public function index()
    {

        return view('instructor.courses.index');
    }

    public function create()
    {
        $categories = Category::get();
        $levels = Level::get();
        return view('instructor.courses.create', compact('categories', 'levels'));
    }

    public function store(CourseRequest $request)
    {
        $course = Course::create($request->all());
        if ($request->hasfile('image')) {
            $url = Storage::put('public/cursos', $request->file('image'));
            $course->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('instructor.courses.edit', $course);
    }

    public function show(Course $course)
    {

        return view('instructor.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $categories = Category::get();
        $levels = Level::get();
        return view('instructor.courses.edit', compact('course', 'categories', 'levels'));
    }

    public function update(CourseRequest $request, Course $course)
    {
        $course->update($request->all());

        if ($request->hasfile('image')) {
            $url = Storage::put('public/cursos', $request->file('image'));
            if ($course->image) {
                Storage::delete($course->image->url);
                $course->image()->update([
                    'url' => $url
                ]);
            } else {
                $course->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('instructor.courses.edit', $course);
    }

    public function destroy(Course $course)
    {
        //
    }
}
