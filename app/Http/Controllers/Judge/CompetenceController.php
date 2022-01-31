<?php

namespace App\Http\Controllers\Judge;

use App\Http\Controllers\Controller;
use App\Models\Subcompetence;
use App\Models\CriterionSubcompetenceUser;
use App\Models\SubcompetenceUser;
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

    public function participants($subcompetence, $criterion)
    {
        $subcompetence = Subcompetence::findOrfail($subcompetence);
        $criterion = Criterion::findOrFail($criterion);
        $participants = SubcompetenceUser::whereCompetenceId($subcompetence->id)->get();
        return view('judge.competences.participants', compact('subcompetence', 'participants', 'criterion'));
    }

    public function show(SubcompetenceUser $participant, Criterion $criterion)
    {
        $score = null;

        foreach ($participant->scores as $scoreParticipant) {
            if ($scoreParticipant->criterionSubcompetenceUser->criterion->id == $criterion->id) {
                $score = $scoreParticipant->value;
                break;
            }
        }
        $count = 1;

        foreach ($participant->images as $image) {
            if ($image) {
                $image->url = $this->getS3URL("competences/resources", $participant->id . '-' . $count);
            }
            $count++;
        }
        return view('judge.competences.score', compact('participant', 'criterion', 'score'));
    }

    public function score(SubcompetenceUser $participant, Criterion $criterion, Request $request)
    {
        //dd($request, $participant, $criterion);
        $subcompetence_criterion = CriterionSubcompetenceUser::whereSubcompetenceId($participant->subcompetence_id)
            ->whereCriterionId($criterion->id)->whereUserId(auth()->user()->id)->first();
        Score::create([
            'subcompetence_user_id' => $participant->id,
            'criterion_subcompetence_user_id' => $subcompetence_criterion->id,
            'value' => $request->score
        ]);

        return back();
    }
}
