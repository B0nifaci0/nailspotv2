<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Task;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function security(Request $request)
    {
        return view('profile.security', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }

    public function delete(Request $request)
    {
        return view('profile.delete', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }

    public function courses()
    {
        $user = auth()->user();
        $details = $user->saleDetails()->paginate(5);
        return view('profile.courses.index', compact('details'));
    }

    public function tasks(Course $course)
    {
        $tasks = $course->lessons()
            ->with('tasks')->get()
            ->pluck('tasks')
            ->collapse()
            ->where('user_id', auth()->user()->id);

        return view('profile.courses.tasks', compact('tasks'));
    }

    public function task(Task $task)
    {
        $course = $task->lesson->course;
        return view('profile.courses.task', compact('task', 'course'));
    }
}
