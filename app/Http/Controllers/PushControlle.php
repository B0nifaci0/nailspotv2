<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Notifications\TasksCompleted;
use App\Models\User;
use NotificationChannels\WebPush\PushSubscription;
use Illuminate\Support\Facades\Auth;
use App\Events\NotificationRead;
use Illuminate\Support\Facades\DB;

class PushControlle extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }
    public function store(Request $request){
        //Guarda las notificaciones
        $user=auth()->user()->id;
        $user=User::findOrFail($user);
        $user->updatePushSubscription($request->input('endpoint'), $request->input('keys.p256dh'), $request->input('keys.auth'));
        return response()->json(['success' => true],200);
    }
}
