<?php

namespace App\Http\Controllers;

use App\Models\CompetenceCriteria;

class PruebitasController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $details = $user->saleDetails;
        return CompetenceCriteria::all();
        return view('pruebitas', compact('details'));
    }
}
