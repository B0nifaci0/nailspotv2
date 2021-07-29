<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Notifications\TasksCompleted;
use App\Models\User;
use NotificationChannels\WebPush\PushSubscription;
use Illuminate\Support\Facades\Auth;
use Notification;

class PushControlle extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //$user=auth()->user()->roles()->first()->name;
        
        $user = $request->user();

        // Limit the number of returned notifications, or return all
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
        $user=auth()->user()->id;
        $user=User::findOrFail($user);
        $user->updatePushSubscription($request->input('endpoint'), $request->input('keys.p256dh'), $request->input('keys.auth'));
        return response()->json(['success' => true],200);
    }
}