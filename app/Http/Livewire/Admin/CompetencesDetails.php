<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Competence;
use Livewire\WithPagination;

class CompetencesDetails extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $competences = Competence::has('sales')->paginate();
        return view('livewire.admin.competences-details', compact('competences'));
    }
}
