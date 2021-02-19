<?php

namespace App\Mail;

use App\Models\Lesson;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GradedAssignament extends Mailable
{
    use Queueable, SerializesModels;

    public $lesson;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.graded-assignament');
    }
}
