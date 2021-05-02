<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Task;
use App\Models\Course;
use Livewire\Component;

class CoursesTasks extends Component
{
    public $course, $task, $title, $description, $quantity = 1;

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

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'quantity' => 'required'
        ]);

        $this->course->tasks()->create([
            'title' => $this->title,
            'description' => $this->description,
            'quantity' => $this->quantity
        ]);
        $this->reset('title');
        $this->reset('description');
        $this->reset('quantity');

        $this->course = Course::find($this->course->id);
    }

    public function edit(Task $task)
    {
        $this->task = $task;
    }

    public function update()
    {
        $this->validate();
        $this->task->save();
        $this->task = new Task();
        $this->course = Course::find($this->course->id);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        $this->course = Course::find($this->course->id);
    }

    public function cancel()
    {
        $this->task = new Task();
    }
}
