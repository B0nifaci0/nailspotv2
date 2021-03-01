<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Task;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Mail\GradedAssignament;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function show(Task $task)
    {
        $course = Course::find($task->lesson->course->id);
        $this->authorize('dicatated', $course);
        return view('instructor.tasks.show', compact('course', 'task'));
    }

    public function update(Task $task, Request $request)
    {
        $task->update([
            'score' => $request->score,
            'status' => Task::CALIFICADA
        ]);

        $task->save();
        $mail = new GradedAssignament($task->lesson);
        Mail::to($task->user->email)->queue($mail);

        return back();
    }

    public function download(Task $task)
    {
        $path = public_path() . '/storage/' . $task->url;
        return response()->download($path, $task->user->slug);
    }
}
