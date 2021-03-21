<?php

namespace App\Http\Livewire\Admin;

use App\Models\Competence;
use Livewire\Component;
use Livewire\WithPagination;

class SaleDetailsCompetence extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $competence;

    public function mount(Competence $competence)
    {
        $this->competence = $competence;
    }

    public function render()
    {
        $details = $this->competence->sales()->paginate();

        return view('livewire.admin.sale-details-competence', compact('details'));
    }

    public function clearPage()
    {
        $this->reset('page');
    }
}
