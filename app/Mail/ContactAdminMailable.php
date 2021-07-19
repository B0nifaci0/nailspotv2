<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactAdminMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject="Mensaje de Contacto";
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('registro@nailspot.com.mx', 'Nailspot')
                    ->view('mail.contact-admin');
    }
}
