<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Competence;
use PDF;

class TableCompetencesController extends Controller
{
    public function __invoke(Competence $competence)
    {
        $scores = $competence->competenceCriterionUser()->with('scores')->get()->pluck('scores')->collapse('competence_user_id');

        return view('admin.reports.competences.scores', compact('competence', 'scores'));
        // $pdf  = PDF::loadView('admin.reports.competences.scores', compact('competence'));
        // return $pdf->stream('reportScores.pdf');
    }
}
