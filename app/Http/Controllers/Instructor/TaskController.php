<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Task;
use App\Models\User;
use App\Models\Course;
use App\Models\TaskUser;
use App\Mail\CourseApproved;
use Illuminate\Http\Request;
use App\Mail\GradedAssignament;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function show(Task $task, User $student)
    {
        $course = Course::find($task->course->id);
        $task = TaskUser::whereTaskId($task->id)
            ->whereUserId($student->id)->first();
        $this->authorize('dicatated', $course);
        return view('instructor.tasks.show', compact('course', 'task'));
    }

    // public function update(Task $task, Request $request)
    // {
    //     $task->update([
    //         'score' => $request->score,
    //         'status' => Task::CALIFICADA
    //     ]);
    //     $user = $task->user;

    //     $task->save();
    //     $mail = new GradedAssignament($task->lesson);
    //     Mail::to($user->email)->queue($mail);

    //     $tasks = Task::whereUserId($user->id)
    //         ->whereStatus(2)->get();

    //     $course = $task->lesson->course;

    //     $lessons = $course->lessons->count();

    //     if ($lessons == $tasks->count()) {
    //         $average = 0;
    //         $sum = 0;
    //         $final = 0;
    //         $exist = 0;
    //         foreach ($tasks as $item) {
    //             if ($item->lesson->final) {
    //                 $final = $item->score;
    //                 $exist = 1;
    //             } else {
    //                 $sum = $sum + $item->score;
    //             }
    //         }
    //         if ($exist == 1) {
    //             $average = $sum / ($tasks->count() - 1);
    //             $final = ($average + $final) / 2;
    //             if ($final >= 8) {
    //                 $approved = new CourseApproved($course);
    //                 Mail::to($user->email)->queue($approved);
    //                 $certificate = $course->certificate;
    //                 $certificate->students()->attach(auth()->user()->id);
    //             }
    //         }
    //     }
    //     return back();
    // }

}
