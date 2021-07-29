<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CourseCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $course, $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($course, $user)
    {
        $this->course=$course;
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.course-created');
    }
}
