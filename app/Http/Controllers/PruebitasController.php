<?php

namespace App\Http\Controllers;

use App\Models\Course;

class PruebitasController extends Controller
{
    public function index()
    {
        dd(env('S3_ENVIRONMENT'));

        return view('pruebitas');
    }
}
