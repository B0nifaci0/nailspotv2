<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FailedCourse extends Mailable
{
    use Queueable, SerializesModels;
    public $course;
    public function __construct($course)
    {
        $this->course=$course;
    }
    public function build()
    {
        return $this->from('registro@nailspot.com.mx', 'Nailspot')
                    ->view('mail.failed-course');
    }
}
