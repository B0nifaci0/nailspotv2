<?php

namespace App\Http\Controllers\Judge;

use App\Http\Controllers\Controller;
use App\Models\Competence;
use App\Models\CompetenceCriterionUser;
use App\Models\CompetenceUser;
use App\Models\Criterion;
use App\Models\Score;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('judge.competences.index');
    }

    public function participants(Competence $competence, Criterion $criterion)
    {
        $participants = CompetenceUser::whereCompetenceId($competence->id)->get();
        return view('judge.competences.participants', compact('competence', 'participants', 'criterion'));
    }

    public function show(CompetenceUser $participant, Criterion $criterion)
    {
        $score = null;
        foreach ($participant->scores as $scoreParticipant) {
            if ($scoreParticipant->competenceCriterionUser->criterion->id == $criterion->id) {
                $score = $scoreParticipant->value;
                break;
            }
        }
        return view('judge.competences.score', compact('participant', 'criterion', 'score'));
    }

    public function score(CompetenceUser $participant, Criterion $criterion, Request $request)
    {
        $competence_criterion = CompetenceCriterionUser::whereCompetenceId($participant->competence_id)
            ->whereCriterionId($criterion->id)->whereUserId(auth()->user()->id)->first();

        Score::create([
            'competence_user_id' => $participant->id,
            'competence_criterion_user_id' => $competence_criterion->id,
            'value' => $request->score
        ]);

        return back();
    }
}
