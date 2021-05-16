<?php

namespace App\Http\Livewire\Instructor\Task;

use App\Models\TaskUser;
use Livewire\Component;

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
    }
}
