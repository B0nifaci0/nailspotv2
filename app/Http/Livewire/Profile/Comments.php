<?php

namespace App\Http\Livewire\Profile;

use App\Models\Comment;
use Livewire\Component;
use App\Models\TaskUser;

class Comments extends Component
{
    public $taskUser, $comment, $body;

    protected $rules = [
        'comment.body' => 'required',
    ];


    public function mount(TaskUser $taskUser)
    {
        $this->taskUser = $taskUser;
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
            'commentable_id' => $this->taskUser->id,
            'commentable_type' => TaskUser::class,
            'user_id' => auth()->user()->id,
        ]);

        $this->reset('body');

        $this->taskUser = TaskUser::find($this->taskUser->id);
    }
}
