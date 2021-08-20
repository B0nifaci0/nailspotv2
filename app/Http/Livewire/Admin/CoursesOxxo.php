<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class CoursesOxxo extends Component
{
    public function render()
    {
        $sales = Sale::wherePaymentPlatformId(2)->get();
        return view('livewire.admin.courses-oxxo', compact('sales'));
    }
}
