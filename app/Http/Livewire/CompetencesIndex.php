<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Level;
use Livewire\Component;
use App\Models\Competence;
use App\Models\Subcategory;
use Livewire\WithPagination;

class CompetencesIndex extends Componet
{
    use WithPagination;

    public $subcategory_id, $subcategory, $level_id;

    public function render()
    {
        $subcategories = Subcategory::all();

        $this->subcategory = Subcategory::find($this->subcategory_id);
        $competences = Competence::whereDate('end_date', '>=', Carbon::today()->toDateString())
            ->status(Competence::PUBLICADO)
            ->subcategory($this->subcategory_id)
            ->latest('id')->paginate(8);

        foreach ($competences as $competence) {
            if ($competence->image) {
                $competence->image->url = $this->getS3URL('competences', $competence->id);
            }
        }
        return view('livewire.competences-index', compact('competences', 'subcategories'));
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
