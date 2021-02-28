<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function security(Request $request)
    {
        return view('profile.security', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }

    public function delete(Request $request)
    {
        return view('profile.delete', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }

    public function courses()
    {
        $user = auth()->user();
        $details = $user->saleDetails()->paginate(5);
        return view('profile.courses', compact('details'));
    }
}
