<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Task;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Mail\GradedAssignament;
use App\Http\Controllers\Controller;
use App\Mail\CourseApproved;
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

        $tasks = Task::whereUserId(auth()->user()->id)
            ->whereStatus(2)->get();

        $lessons = $task->lesson->course->lessons->count();

        if ($lessons == $tasks->count()) {
            $average = 0;
            $sum = 0;
            $final = 0;
            foreach ($tasks as $item) {
                if ($item->lesson->final) {
                    $final = $item->score;
                } else {
                    $sum = $sum + $item->score;
                }
            }
            $average = $sum / ($tasks->count() - 1);
            $final = ($average + $final) / 2;

            if ($final >= 8) {
                $approved = new CourseApproved($task->lesson->course);
                Mail::to($task->user->email)->queue($approved);
            } else {
                return "no pasas";
            }
        }

        return back();
    }

    public function download(Task $task)
    {
        $path = public_path() . '/storage/' . $task->url;
        return response()->download($path, $task->user->slug);
    }
}
