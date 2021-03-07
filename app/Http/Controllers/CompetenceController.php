<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompetenceController extends Controller
{

    public function index()
    {
        return view('competences.index');
    }
}
