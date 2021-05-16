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
    }

}
