<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Notification extends Component
{
    public $notifications;
    protected $listeners=['mount'];

    public function mount(){
        $user=auth()->user()->id;
        $this->notifications=DB::table('notifications')->where('notifiable_id',$user)->get();
    }
    public function render()
    {
        return view('livewire.notification');
    }
    public function destroy($id){
        $notification=DB::table('notifications')->where('id', $id)->delete();
        $this->mount();
    }
    public function deleteAll($user_id){
        $this->notifications=DB::table('notifications')->where('notifiable_id', $user_id)->delete();
        $this->mount();
    }
}
