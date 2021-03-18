<?php

namespace App\Http\Controllers\Judge;

use App\Http\Controllers\Controller;
use App\Models\Competence;
use App\Models\CompetenceUser;
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

    public function participants(Competence $competence)
    {
        $participants = CompetenceUser::whereCompetenceId($competence->id)->get();
        return $participants;
    }
}
