<?php

namespace App\Http\Livewire\Judge;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CompetenceCriterionUser;

class CompetencesIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {

        $user = auth()->user();

        // $competences = $user->competences()
        //     ->where('competences.name', 'LIKE', "%$this->search%")
        //     ->latest('id')
        //     ->paginate(8);

        // $competences = CompetenceCriterionUser::with('competence', function ($query) {
        //     return $query->where('name', 'LIKE', "%$this->search%");
        // })->get();
        $competences = CompetenceCriterionUser::all()->user;
        dd($competences);
        // $competences = CompetenceCriterionUser::whereUserId($user->id)->paginate(8);

        return view('livewire.judge.competences-index', compact('competences'));
    }

    public function clearPage()
    {
        $this->reset('page');
    }
}
