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

    public function index(Request $request)
    {
        $user = $request->user();

        //Envia las notificaciones en un objetp
        $query = $user->unreadNotifications();
        $limit = (int) $request->input('limit', 0);
        if ($limit) {
            $query = $query->limit($limit);
        }

        $notifications = $query->get()->each(function ($n) {
            $n->created = $n->created_at->toIso8601String();
        });

        $total = $user->unreadNotifications->count();
        return compact('notifications', 'total');
    }
    /**
     * Store the PushSubscription.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        //Guarda las notificaciones
        $user=auth()->user()->id;
        $user=User::findOrFail($user);
        $user->updatePushSubscription($request->input('endpoint'), $request->input('keys.p256dh'), $request->input('keys.auth'));
        return response()->json(['success' => true],200);
    }

    public function readNotification($id){
        //Elimina la notificacion
        $notifications=DB::table('notifications')->delete($id);
        return response()->json(['success'=>true],200);
    }
}
