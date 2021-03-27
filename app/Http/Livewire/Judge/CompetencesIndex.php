<?php

namespace App\Http\Livewire\Judge;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CompetenceCriterionUser;

class CompetencesIndex extends Component
{
    use WithPagination;
    public $search = 'pruebita';

    public function render()
    {
        $competences = CompetenceCriterionUser::whereUserId(auth()->user()->id)->get();
        return view('livewire.judge.competences-index', compact('competences'));
    }

    public function clearPage()
    {
        $this->reset('page');
    }
}
