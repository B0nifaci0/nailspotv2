<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Task;
use App\Models\TaskUser;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TasksUser extends Component
{
    use AuthorizesRequests;

    public $course, $current;

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->authorize('enrolled', $course);
        $this->current = new TaskUser();
    }

    public function render()
    {
        return view('livewire.tasks-user');
    }

    public function changeTask(Task $task)
    {
        $this->current = TaskUser::whereTaskId($task->id)
            ->whereUserId(auth()->user()->id)->first();

        if (!$this->current) {
            $this->current = new TaskUser();
            $this->resetErrorBag();
            $this->addError('taskNotFound', 'No tienes imagenes!');
        }
    }

    public function clear()
    {
        $this->current = new TaskUser();
    }
}
