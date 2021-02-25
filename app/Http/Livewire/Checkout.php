<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use App\Models\Course;
use Livewire\Component;

class Checkout extends Component
{
    public $course, $search, $active, $current, $total;

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->total = $course->price;
    }

    public function render()
    {
        $coupon = Coupon::firstWhere('code', $this->search);
        if ($coupon) {
            $this->current = $coupon;
        } else {
            $this->current = null;
        }
        return view('livewire.checkout', compact('coupon'));
    }

    public function addCoupon()
    {
        $this->total = $this->course->price;
        $this->active = $this->current;
        if ($this->active) {
            if ($this->active->type == 0) {
                $this->total = $this->total - $this->active->discount;
            } else {
                $this->total = $this->total - ($this->total * $this->active->discount / 100);
            }
        } else {
            $this->active = null;
        }
    }

    public function clearActive()
    {
        $this->reset('active');
        $this->total = $this->course->price;
    }
}
