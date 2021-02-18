<?php

namespace App\Http\Livewire;

use App\Mail\Assignament;
use App\Models\Lesson;
use App\Models\Task;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;

class LessonAssignament extends Component
{
    use WithFileUploads;

    public $lesson, $file, $user, $task;

    public function mount(Lesson $lesson)
    {
        $this->user = auth()->user();
        $this->lesson = $lesson;
        $this->task = $lesson->tasks()->whereUserId($this->user->id)->first();
    }

    public function render()
    {
        return view('livewire.lesson-assignament');
    }

    public function save()
    {
        $this->validate([
            'file' => 'required'
        ]);


        $url = $this->file->store('resource');

        Task::create([
            'url' => $url,
            'user_id' => $this->user->id,
            'lesson_id' => $this->lesson->id
        ]);


        $mail = new Assignament($this->lesson, $this->user);
        Mail::to($this->lesson->course->teacher->email)->queue($mail);

        $this->lesson = Lesson::find($this->lesson->id);
        $this->task = Task::whereUserId($this->user->id)->first();
    }
}
