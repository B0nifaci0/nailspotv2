<?php

namespace App\Http\Livewire\Judge;

use Livewire\WithPagination;
use App\Http\Livewire\Componet;
use App\Models\CriterionSubcompetenceUser;

class CompetencesIndex extends Componet
{
    use WithPagination;
    public $search = 'pruebita';

    public function render()
    {
        $subcompetences = CriterionSubcompetenceUser::whereUserId(auth()->user()->id)->get();

        /*foreach ($subcompetences as $item) {
            if ($item->competence->image) {
                $item->competence->image->url = $this->getS3URL('competences', $item->competence->id);
            }
        }*/

        return view('livewire.judge.competences-index', compact('subcompetences'));
    }

    public function clearPage()
    {
        $this->reset('page');
    }
}
