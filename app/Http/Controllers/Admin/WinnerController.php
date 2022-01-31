<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TiedMail;
use App\Models\Competence;
use App\Models\CriterionSubcompetenceUser;
use App\Models\Subcompetence;
use App\Models\Score;
use Illuminate\Support\Facades\Mail;

class WinnerController extends Controller
{
    public $subcompetenceID = null, $level = null;

    public function index(Competence $competence)
    {
        $subcompetences = $competence->subcompetences;
        return view('admin.competences.winner.index', compact('subcompetences'));
    }

    public function selectWinner(Subcompetence $subcompetence)
    {
        $w = [];
        $before = null;
        $data = [];
        $levels = $subcompetence->levels;
        $this->subcompetenceID = $subcompetence->id;
        foreach ($levels as $key => $this->level) {
            $winners = Score::WhereHas('subcompetenceUser', function ($query) {
                $query->where('subcompetence_id', $this->subcompetenceID);
            })->WhereHas('subcompetenceUser', function ($query) {
                $query->where('level_id', $this->level->id);
            })->get();
            array_push($data, $winners);
        }
        foreach ($data as $key => $win) {
            for ($i = 0; $i < count($win); $i++) {
                if ($before != null) {
                    if ($win[$i]['value'] > $before['value']) {
                        array_push($w, $win[$i]);
                    }
                    if ($win[$i]['value'] == $before['value']) {
                        $tied = $winners->where('value', $win[$i]['value']);
                        $judges = CriterionSubcompetenceUser::Where('subcompetence_id', $subcompetence->id)->get(); 
                        for ($j=0; $j<count($w); $j++) {                            
                            $w[$j]->update(['value'=>$w[$j]['value']+10]);
                        }
                        foreach ($judges as $key => $judge) {                       
                            $tiedMail = new TiedMail($tied, $subcompetence);
                            Mail::to($judge->user->email)->queue($tiedMail);
                        }
                    }
                } else {
                    array_push($w, $win[$i]);
                }
                $before = $win[$i];
            }
        }
        return view('admin.competences.winner.winners', compact('subcompetence', 'data', 'levels', 'w'));
    }
}
