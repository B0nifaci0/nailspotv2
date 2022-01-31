<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TiedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $winners, $subcompetence;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($winners, $subcompetence)
    {
        $this->winners = $winners;
        $this->subcompetence = $subcompetence;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.tied-mail');
    }
}
