<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Task;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class LessonTasks extends Component
{
    public $course, $student, $lesson, $name, $task, $tasks;

    protected $rules = [
        'task.score' => 'required'
    ];

    public function mount(Course $course, User $student)
    {
        $this->student = $student;
        $this->course = $course;
        $this->tasks = $this->course->lessons()
            ->with('tasks')->get()
            ->pluck('tasks')
            ->collapse()
            ->where('user_id', $student->id);
        // dd($this->tasks);
        $this->task = new Task();
    }

    public function render()
    {
        return view('livewire.instructor.lesson-tasks');
    }

    // public function edit(Task $task)
    // {
    //     $this->resetValidation();

    //     $this->tasks = $this->course->lessons()
    //         ->with('tasks')->get()
    //         ->pluck('tasks')
    //         ->collapse()
    //         ->where('user_id', $this->student->id);
    //     $this->lesson = Lesson::find($task->lesson->id);
    //     $this->task = $task;
    //     // dd($this->lesson);
    // }

    // public function update()
    // {
    //     $this->task = Task::firstWhere('lesson_id', $this->lesson->id);

    //     $this->validate();
    //     $this->task->save();

    //     $this->student = User::find($this->student->id);
    //     $this->course = Course::find($this->course->id);
    //     $this->lesson = new Lesson();
    //     $this->tasks = $this->course->lessons()
    //         ->with('tasks')->get()
    //         ->pluck('tasks')
    //         ->collapse()
    //         ->where('user_id', $this->student->id);
    //     $this->task = new Task();
    // }

    // public function cancel()
    // {
    //     $this->lesson = new Lesson();
    //     $this->tasks = $this->course->lessons()
    //         ->with('tasks')->get()
    //         ->pluck('tasks')
    //         ->collapse()
    //         ->where('user_id', $this->student->id);
    // }

    // public function download(Task $item)
    // {
    //     return Storage::disk('public')->download($item->url);
    // }
}
