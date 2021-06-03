<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Message;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts=Contact::all();
        return view('contact',[
            'contacts'=>$contacts
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|min:5|max:50',
            'email'=>'required|email|min:10',
            'message'=>'required|min:10|max:250'
        ]);
        Message::create($request->all());
        session()->flash('exito', '¡Gracias por tus comenetarios!');
        return redirect()->route('contact.index');
    }   

    public function indexAdmin(){
        $contact=Contact::all();
        return view('admin.contact.index',[
            'contact'=>$contact 
        ]);
    }

    public function editAdmin(Contact $contact){
        return view('admin.contact.edit', [
            'contact'=>$contact
        ]);
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
