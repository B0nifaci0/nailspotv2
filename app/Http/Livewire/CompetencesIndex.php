<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Level;
use Livewire\Component;
use App\Models\Competence;
use App\Models\Subcategory;
use Livewire\WithPagination;

class CompetencesIndex extends Component
{
    use WithPagination;

    public $subcategory_id, $subcategory;
    public $level_id, $level_selected;

    public function render()
    {
        $subcategories = Subcategory::all();
        $levels = Level::all();

        $this->subcategory = Subcategory::find($this->subcategory_id);
        $this->level_selected = Level::find($this->level_id);

        $competences = Competence::whereDate('end_date', '>=', Carbon::today()->toDateString())
            ->status(Competence::PUBLICADO)
            ->subcategory($this->subcategory_id)
            ->level($this->level_id)
            ->latest('id')->paginate(8);

        return view('livewire.competences-index', compact('competences', 'levels', 'subcategories'));
    }

    public function clear()
    {
        $this->reset(['subcategory_id', 'level_id']);
    }

    public function clearPage()
    {
        $this->reset('page');
    }
}
