<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Task;

class PruebitasController extends Controller
{
    public function index()
    {
        return view('certificado');
    }
}
