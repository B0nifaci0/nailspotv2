<?php

namespace App\Http\Livewire\Instructor\Task;

use Livewire\Component;
use App\Models\TaskUser;
use App\Mail\GradedAssignament;
use Illuminate\Support\Facades\Mail;

class Score extends Component
{

    public $taskuser, $comment;

    public $selectedScore = NULL;

    public function mount(TaskUser $taskuser)
    {
        $this->taskuser = $taskuser;
    }

    public function render()
    {
        return view('livewire.instructor.task.score');
    }

    public function qualify()
    {
        $taskuser = $this->taskuser;
        $taskuser->score = $this->selectedScore;
        $taskuser->save();

        $mail = new GradedAssignament($taskuser);
        Mail::to($taskuser->user->email)->queue($mail);

        // $userTasks = TaskUser::whereUserId($user->id)
        //     ->whereStatus(2)->get();

        //     $course = $task->lesson->course;

        //     $tasks = $course->tasks->count();

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
    }
}
