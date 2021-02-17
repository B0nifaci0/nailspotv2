<?php

namespace App\Mail;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Assignament extends Mailable
{
    use Queueable, SerializesModels;

    public $lesson, $student;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Lesson $lesson, User $user)
    {
        $this->lesson = $lesson;
        $this->student = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.lesson-assignament');
    }
}
