<?php

namespace App\Http\Controllers;
class PruebitasController extends Controller
{
    public $contador = 0;
    public function index()
    {
        $user = auth()->user();
        $details = $user->saleDetails;

        return view('pruebitas',compact('details'));
    }
}
