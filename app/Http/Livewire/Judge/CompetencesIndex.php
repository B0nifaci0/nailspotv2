<?php

namespace App\Http\Livewire\Judge;

use Livewire\WithPagination;
use App\Http\Livewire\Componet;
use App\Models\CompetenceCriterionUser;

class CompetencesIndex extends Componet
{
    use WithPagination;
    public $search = 'pruebita';

    public function render()
    {
        $competences = CompetenceCriterionUser::whereUserId(auth()->user()->id)->get();

        foreach ($competences as $item) {
            if ($item->competence->image) {
                $item->competence->image->url = $this->getS3URL('competences', $item->competence->id);
            }
        }
        
        return view('livewire.judge.competences-index', compact('competences'));
    }

    public function clearPage()
    {
        $this->reset('page');
    }
}
