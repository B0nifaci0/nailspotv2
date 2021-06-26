<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Message;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\Notifications\ContactForm;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public $contact;
    public function __construct(){
        $this->contact=Contact::all();
    }
    public function index(){
        $contacts=$this->contact;
        return view('contact',compact('contacts'));
    }
    public function store(Request $request){
        $data=$request->validate([
            'name'=>'required|min:5|max:50',
            'surname'=>'required|min:5|max:50',
            'email'=>'required|email|min:10',
            'message'=>'required|min:10|max:250'
        ]);
        try {
            $to=$request->email;
            Notification::route('mail', $to)->notify(new ContactForm($data));
            session()->flash('exito', '¡Gracias por tus comenetarios!');
            Message::create($data);
            return redirect()->route('contact.index');
            
        } catch (\Throwable $th) {
            session()->flash('error', '¡Oops! Parece que hubo un error, intenta mas tarde.');
            return redirect()->route('contact.index');
        }
    }   

    public function indexAdmin(){
        $contact=$this->contact;
        return view('admin.contact.index',compact('contact'));
    }

    public function editAdmin(Contact $contact){
        return view('admin.contact.edit', compact('contact'));
    }
    public function update(Request $request, Contact $contact){
        $request->validate([
            'ubication'=>'required|min:10',
            'phone'=>'required|integer|regex:/^[0-9]{10}$/',
            'email'=>'required|email',
            'facebook' =>'url|regex:/http(?:s):\/\/(?:www\.)facebook\.com\/.+/i',
            'instagram'=>'url|regex:/http(?:s):\/\/(?:www\.)instagram\.com\/.+/i',
            'youtube'=>'url|regex:/http(?:s):\/\/(?:www\.)youtube\.com\/.+/i',
        ]);
        $contact->update($request->all());
        return redirect()->route('admin.message.index', $contact)->with(['info'=>'¡El contacto se actualizo correctamente!']);
    }

    public function destroy(Message $message){
        $message->delete();
        return redirect()->route('admin.message.index')->with(['info'=>'¡El mensaje se elimino correctamente!']);
    }
}
