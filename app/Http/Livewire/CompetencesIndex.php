<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Carbon\Carbon;
use App\Models\Level;
use Livewire\Component;
use App\Models\Competence;
use Livewire\WithPagination;

class CompetencesIndex extends Componet
{
    use WithPagination;

    public $category_id, $category, $level_id;

    public function render()
    {
        $categories = Category::all();
        $this->categories = Category::find($this->category_id);
        $competences = Competence::whereDate('end_date', '>=', Carbon::today()->toDateString())
            ->status(Competence::PUBLICADO)
            ->latest('id')->paginate(8);

        foreach ($competences as $competence) {
            if ($competence->image) {
                $competence->image->url = $this->getS3URL('competences', $competence->id);
            }
        }
        return view('livewire.competences-index', compact('competences', 'categories'));
    }

    public function clear()
    {
        $this->reset(['category_id']);
    }

    public function clearPage()
    {
        $this->reset('page');
    }
}
