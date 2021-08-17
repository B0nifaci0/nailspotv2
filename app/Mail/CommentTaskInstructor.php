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
    public $subject="Nuevo Comentario";
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
        return $this->from('registro@nailspot.com.mx', 'Nailspot')
                    ->view('mail.comment-task-instructor');
    }
}
