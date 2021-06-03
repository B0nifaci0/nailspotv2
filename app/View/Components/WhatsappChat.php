<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Contact;

class WhatsappChat extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $contact=Contact::all();
        return view('components.whatsapp-chat', compact('contact'));
    }
}
