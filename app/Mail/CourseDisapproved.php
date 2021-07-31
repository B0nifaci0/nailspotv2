<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CourseDisapproved extends Mailable
{
    use Queueable, SerializesModels;

    public $course;
    public function __construct($course)
    {
        $this->course=$course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.course-dissaproved');
    }
}
