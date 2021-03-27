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
        $competences = CompetenceCriterionUser::whereUserId($user->id)->get();

        return $competences;
    }
}
