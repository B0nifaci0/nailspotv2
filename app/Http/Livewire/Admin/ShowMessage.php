<?php

namespace App\Http\Livewire\Admin;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;
class ShowMessage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search="";
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $messages=Message::Where('name', 'like', '%' .$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search.'%')
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('livewire.admin.show-message', compact('messages'));
    }
}
