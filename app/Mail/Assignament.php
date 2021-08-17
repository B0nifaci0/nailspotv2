<?php

namespace App\Mail;


use App\Models\TaskUser;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Assignament extends Mailable
{
    use Queueable, SerializesModels;

    public $task, $user;
    public $subject="Tarea Entregada";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $task)
    {
        $this->user=$user;
        $this->task =$task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('registro@nailspot.com.mx','Nailspot')
                    ->view('mail.lesson-assignament');
    }
}
