<?php

namespace App\Http\Livewire\Instructor\Task;

use App\Models\Course;
use Livewire\Component;
use App\Models\TaskUser;
use App\Mail\CourseApproved;
use App\Mail\GradedAssignament;
use App\Models\Task;
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

        $course = Course::find($taskuser->task->course->id);

        $taskComplete = $course->tasks()
            ->with('taskUser')
            ->get()
            ->pluck('taskUser')
            ->collapse()
            ->where('user_id', auth()->user()->id)
            ->where('score', '!=', null);

        if ($taskComplete->count() == $course->tasks_count) {
            $average = 0;
            $sum = 0;
            $final = 0;
            $exist = 0;
            foreach ($taskComplete as $taskU) {
                $current = Task::find($taskU->task_id);
                if ($current->final) {
                    $final = $taskU->score;
                    $exist = 1;
                } else {
                    $sum = $sum + $taskU->score;
                }
            }
            if ($exist == 1) {
                $average = $sum / ($course->tasks_count - 1);
                $final = ($average + $final) / 2;
                if ($final >= 8) {
                    $approved = new CourseApproved($course);
                    Mail::to($taskuser->user->email)->queue($approved);
                    $certificate = $course->certificate;
                    $certificate->students()->attach(auth()->user()->id);
                }
            }
        }

        
    }
}
