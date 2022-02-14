<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TiedMail;
use App\Models\Competence;
use App\Models\Subcompetence;
use App\Models\CriterionSubcompetenceUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WinnerController extends Controller
{

    public function index(Competence $competence)
    {
        $subcompetences = $competence->subcompetences;
        return view('admin.competences.winner.index', compact('subcompetences'));
    }

    public function selectWinner(Subcompetence $subcompetence, Request $request)
    {
        $before = null;
        $winners = [];
        $participant = [];
        $subcompetencesUser = $subcompetence->subcompetenceUser()
            ->where('level_id', $request->level)
            ->get();
        for ($i = 0; $i < count($subcompetencesUser); $i++) {
            if ($before != null) {
                if ($subcompetencesUser[$i]->final_score > $before->final_score) {
                    array_push($winners, $subcompetencesUser[$i]);
                } 
                if ($subcompetencesUser[$i]->final_score == $before->final_score) {
                    $tied = $subcompetencesUser->where('final_score', $subcompetencesUser[$i]->final_score);
                    $judges = CriterionSubcompetenceUser::Where('subcompetence_id', $subcompetence->id)->get();
                    foreach ($judges as $key => $judge) {
                        $tiedMail = new TiedMail($tied, $subcompetence);
                        Mail::to($judge->user->email)->queue($tiedMail);
                    }
                }
            } else {
                array_push($winners, $subcompetencesUser[$i]);
            }
            $before = $subcompetencesUser[$i];
        
        }
        return view('admin.competences.winner.winners', compact('winners', 'subcompetence'));
    }
}
