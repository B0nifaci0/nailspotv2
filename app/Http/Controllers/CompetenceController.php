<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{

    public function index()
    {
        return view('competences.index');
    }

    public function show(Competence $competence)
    {
        $this->authorize('published', $competence);

        return view('competences.show', compact('competence'));
    }

    public function enrolled(Competence $competence, Request $request)
    {
        $competence->students()->attach(auth()->user()->id);

        Sale::create([
            'user_id' => auth()->user()->id,
            'saleable_id' => $competence->id,
            'saleable_type' => Competence::class,
            'coupon_id' => $request->coupon_id,
            'final_price' => 0
        ]);

        return redirect()->route('competence.index');
    }

    public function status(Competence $competence)
    {
        return view('competences.status');
    }
}
