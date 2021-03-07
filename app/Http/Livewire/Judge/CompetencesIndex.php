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

        $user = auth()->user();

        $competences = CompetenceCriterionUser::with('competence.criteria')
            ->get()
            ->pluck('competence.criteria')
            ->collapse('competence')
            ->where('user_id', $user->id)
            ->sortByDesc('id')
            ->unique();

        // $competences = CompetenceCriterionUser::whereUserId($user->id)
        //     ->with('competence')
        //     ->where('name', 'LIKE', "%$this->search%")
        //     ->paginate(8);

        return view('livewire.judge.competences-index', compact('competences'));
    }

    public function clearPage()
    {
        $this->reset('page');
    }
}
