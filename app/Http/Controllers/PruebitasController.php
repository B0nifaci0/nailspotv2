<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Competence;
use App\Models\CompetenceCriterionUser;

class PruebitasController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $date =  Carbon::today()->toDateString();
        $courses = Competence::whereDate('end_date', '>=', $date)->get();

        return $courses;

        // $competences = CompetenceCriterionUser::with('competence.criteria')
        //     ->get()
        //     ->pluck('competence.criteria')
        //     ->collapse('competence')
        //     ->where('user_id', $user->id)
        //     ->unique();
        // return view('pruebitas', compact('competences'));
    }
}
