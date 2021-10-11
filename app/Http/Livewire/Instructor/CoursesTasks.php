<?php

namespace App\Http\Livewire\Instructor;

use App\Events\NewTask as EventsNewTask;
use App\Events\NewTask;
use App\Models\Task;
use App\Models\Course;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class CoursesTasks extends Component
{
    public $course, $task, $title, $description, $quantity = 1, $users, $student;
    public $rules = [
        'task.title' => 'required',
        'task.description' => 'required',
        'task.quantity' => 'required|numeric'
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->task = new Task();
    }

    public function render()
    {
        return view('livewire.instructor.courses-tasks');
    }

    public function storeFinal()
    {

        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'quantity' => 'required'
        ]);

        $this->course->tasks()->create([
            'title' => $this->title,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'final' => true
        ]);
        $this->reset('title');
        $this->reset('description');
        $this->reset('quantity');

        $this->course = Course::find($this->course->id);
        event(new NewTask($this->course));
        session()->flash('createTask', 'La tarea se creó con exito');
        $this->emit('alert_remove');
    }


    public function edit($id)
    {
        $this->task = Task::find($id);
    }

    public function update()
    {
        $this->validate();
        $this->task->save();
        $this->task = new Task();
        $this->course = Course::find($this->course->id);
        session()->flash('updateTask', 'La tarea se actualizo');
        $this->emit('alert_remove');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->forceDelete();
        $this->course = Course::find($this->course->id);
        session()->flash('destroyTask', 'La tarea se elimino con exito');
        $this->emit('alert_remove');
    }

    public function cancel()
    {
        $this->task = new Task();
    }
}
