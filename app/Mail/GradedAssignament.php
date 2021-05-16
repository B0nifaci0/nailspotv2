<?php

namespace App\Mail;

use App\Models\TaskUser;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GradedAssignament extends Mailable
{
    use Queueable, SerializesModels;

    public $taskuser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(TaskUser $taskuser)
    {
        $this->taskuser = $taskuser;
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
