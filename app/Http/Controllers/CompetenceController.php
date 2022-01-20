<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Competence;
use App\Models\CompetenceDetail;
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
        $subcompetences = CompetenceDetail::Where('user_id', auth()->user()->id)
            ->where('competence_id', $competence->id)
            ->where('status', "0")
            ->get();
        foreach ($subcompetences as $subcompetence) {
            $subcompetence->status = "1";
            $subcompetence->save();
        }
        Sale::create([
            'user_id' => auth()->user()->id,
            'saleable_id' => $competence->id,
            'saleable_type' => Competence::class,
            'coupon_id' => $request->coupon_id,
            'final_price' => 0
        ]);

        return redirect()->route('competences.index');
    }

    public function detailsCompetence(Competence $competence)
    {
        return view('competences.details', compact('competence'));
    }

    public function status(Competence $competence)
    {
        $this->authorize('enrolled', $competence);

        return view('competences.status', compact('competence'));
    }
}
