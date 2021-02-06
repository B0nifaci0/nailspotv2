<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

class CoursesLesson extends Component
{
    public $course, $lesson, $name, $url, $description;

    protected $rules = [
        'lesson.name' => 'required',
        'lesson.description' => 'required',
        'lesson.url' => ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/']
    ];

    public function mount(Course $course)
    {
        $this->course = $course;

        $this->lesson = new Lesson();
    }

    public function render()
    {
        return view('livewire.instructor.courses-lesson');
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'url' => ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/']
        ];

        $this->validate($rules);

        Lesson::create([
            'name' => $this->name,
            'url' => $this->url,
            'description' => $this->description,
            'course_id' => $this->course->id
        ]);

        $this->reset(['name', 'url', 'description']);
        $this->course = Course::find($this->course->id);
    }

    public function edit(Lesson $lesson)
    {
        $this->resetValidation();
        $this->lesson = $lesson;
    }

    public function update()
    {
        $this->validate();
        $this->lesson->save();
        $this->lesson = new Lesson();
        $this->course = Course::find($this->course->id);
    }

    public function cancel()
    {
        $this->lesson = new Lesson();
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        $this->course = Course::find($this->course->id);
    }
}
