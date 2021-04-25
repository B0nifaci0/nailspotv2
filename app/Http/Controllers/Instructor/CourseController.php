<?php

namespace App\Http\Controllers\Instructor;

use App\Models\User;
use App\Models\Level;
use App\Models\Course;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Storage;


class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Leer cursos')->only('index');
        $this->middleware('can:Crear cursos')->only('create', 'store');
        $this->middleware('can:Actualizar cursos')->only('edit', 'update', 'goals');
        $this->middleware('can:Eliminar cursos')->only('destroy');
    }

    public function index()
    {
        return view('instructor.courses.index');
    }

    public function create()
    {
        $levels = Level::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        return view('instructor.courses.create', compact('categories', 'levels'));
    }

    public function store(CourseRequest $request)
    {
        $course = Course::create($request->all());

        if ($request->hasfile('image')) {
            $url = Storage::put('/courses', $request->file('image'));
            $course->image()->create([
                'url' => $url
            ]);
        }

        if ($request->hasfile('pdf')) {
            $url = Storage::put('/certificates', $request->file('pdf'));
            $course->certificate()->create([
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
        $this->authorize('dicatated', $course);
        $levels = Level::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        return view('instructor.courses.edit', compact('course', 'categories', 'levels'));
    }

    public function update(CourseRequest $request, Course $course)
    {
        $this->authorize('dicatated', $course);

        $course->update($request->all());

        if ($request->hasfile('image')) {
            $url = Storage::put('public/courses', $request->file('image'));
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

        if ($request->hasfile('pdf')) {
            $url = Storage::put('public/certificates', $request->file('pdf'));
            if ($course->certificate) {
                Storage::delete($course->certificate->url);
                $course->certificate()->update([
                    'url' => $url
                ]);
            } else {
                $course->certificate()->create([
                    'url' => $url
                ]);
            }
        }
        return redirect()->route('instructor.courses.edit', $course);
    }

    public function tasks(Course $course, User $student)
    {
        $this->authorize('dicatated', $course);
        return view('instructor.courses.tasks', compact('student', 'course'));
    }

    public function goals(Course $course)
    {
        $this->authorize('dicatated', $course);
        return view('instructor.courses.goals', compact('course'));
    }

    public function status(Course $course)
    {
        $course->status = Course::REVISION;
        $course->save();
        return back();
    }
}
