<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competence;
use App\Models\Subcompetence;
use App\Models\Score;

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
                    } else {
                        
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
