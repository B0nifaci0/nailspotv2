<?php

namespace App\Http\Controllers;
use App\Models\Nosotros;
use Illuminate\Http\Request;



class NosotrosController extends Controller
{
    public function index()
    {
        $nosotros = Nosotros::latest('id')->get()->take(1);
        //return $nosotros;

        return view('nosotros', compact('nosotros'));
    }

    /*public function show()
    {
        $nosotros = Nosotros::latest('id')->get()->take(1);

        return $nosotros;
        return view('nosotros', compact('nosotros'));
    }*/
}
