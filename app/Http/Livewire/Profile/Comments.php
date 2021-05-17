<?php

namespace App\Http\Livewire\Profile;

use App\Models\Task;
use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{
    public $task, $comment, $body;

    protected $rules = [
        'comment.body' => 'required',
    ];


    public function mount(Task $task)
    {
        $this->task = $task;
    }

    public function render()
    {
        return view('livewire.profile.comments');
    }

    public function store()
    {
        $rules = [
            'body' => 'required',
        ];

        $this->validate($rules);


        Comment::create([
            'body' =>  $this->body,
            'commentable_id' => $this->task->id,
            'commentable_type' => Task::class,
            'user_id' => auth()->user()->id,
        ]);

        $this->reset('body');

        $this->task = Task::find($this->task->id);
    }
}
