<?php

namespace App\Http\Livewire\Profile;

use App\Mail\CommentTaskInstructor;
use App\Mail\CommentTaskUser;
use App\Models\Comment;
use Livewire\Component;
use App\Models\TaskUser;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class Comments extends Component
{
    public $taskUser, $comment, $body, $instructor, $user;

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
        $this->instructor=User::find($this->taskUser->task->course->user_id);
        if($this->taskUser->user_id==auth()->user()->id){
            $instructorMail=new CommentTaskInstructor($this->taskUser);
            Mail::to($this->instructor->email)->queue($instructorMail);
        }else{
            $userMail=new CommentTaskUser($this->taskUser);
            Mail::to($this->taskUser->user->email)->queue($userMail);
        }
    }
}
