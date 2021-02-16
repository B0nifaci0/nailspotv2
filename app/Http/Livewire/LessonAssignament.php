<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use Livewire\Component;
use Livewire\WithFileUploads;

class LessonAssignament extends Component
{
    use WithFileUploads;

    public $lesson, $file;

    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
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

        $this->lesson->users()->attach(auth()->user()->id, [
            'url' => $url,
            'user_id' => auth()->user()->id,
            'lesson_id' => $this->lesson->id
        ]);


        $this->lesson = Lesson::find($this->lesson->id);
    }
}
