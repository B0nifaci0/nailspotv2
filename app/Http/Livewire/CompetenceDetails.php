<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SubcompetenceUser;
use App\Models\Level;
use App\Models\Subcompetence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

class CompetenceDetails extends Component
{
    use WithPagination;

    public $competence;
    public function render()
    {
        $saleDetail = SubcompetenceUser::Where('competence_id', $this->competence->id)->get();
        $levels = Level::all();
        return view('livewire.competence-details', compact('saleDetail','levels'));
    }

    public function search()
    {
        $this->subcompetences = Subcompetence::whereHas('levels', function (Builder $query) {
            $query->where('level_id', '=', $this->level);
        })->whereHas('categories', function (Builder $query) {
            $query->where('category_id', '=', $this->category);
        })->whereHas('competences', function (Builder $query) {
            $query->where('competence_id', '=', $this->competence->id);
        })->get();
        
    }

    public function save($subcompetence)
    {
        SubcompetenceUser::create([
            'competence_id' => $this->competence->id,
            'subcompetence_id' => $subcompetence['id'],
            'user_id' => Auth::user()->id,
            'level_id' => $this->level,
            'price' => $subcompetence['price']
        ]);
    }
}
