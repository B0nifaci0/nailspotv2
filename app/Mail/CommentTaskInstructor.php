<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentTaskInstructor extends Mailable
{
    use Queueable, SerializesModels;

    public $taskUser;
    public function __construct($taskUser)
    {
        $this->taskUser=$taskUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.comment-task-instructor');
    }
}
