<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\AdminCourseApproved;
use App\Mail\CourseDisapproved;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

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
        $instructor=$course->user_id;
        $instructor=User::find($instructor);
        $courseApproved=new AdminCourseApproved($course);
        Mail::to($instructor->email)->queue($courseApproved);
        return redirect()->route('admin.courses.index')->with('info', "El curso ha sido publicado exitosamente!");;
    }

    public function disapproved(Request $request)
    {
        $course = Course::find($request->course);
        $this->authorize('revision', $course);

        Comment::create([
            'body' =>  $request->body,
            'commentable_id' => $course->id,
            'commentable_type' => Course::class,
            'user_id' => auth()->user()->id,
        ]);

        $course->status = 1;
        $course->save();
        $instructor=$course->user_id;
        $instructor=User::find($instructor);
        $courseDissaproved=new CourseDisapproved($course);
        Mail::to($instructor->email)->queue($courseDissaproved);
        return redirect()->route('admin.courses.index')->with('info', "El curso no se ha publicado");
    }
}
