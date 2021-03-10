<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use App\Models\Coupon;
use App\Models\Course;
use Livewire\Component;

class Checkout extends Component
{
    public $course, $search, $active, $current, $total, $couponId, $exist;

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
            $this->exist = Sale::whereUserId(auth()->user()->id)->whereCouponId($this->active->id)->first();

            if ($this->exist) {
                $this->resetErrorBag();
                $this->addError('exist', 'Ya usaste este cupón!');
                $this->active = null;
                $this->couponId = null;
            } else {
                if ($this->active->type == 0) {
                    $this->total = $this->total - $this->active->discount;
                } else {
                    $this->total = $this->total - ($this->total * $this->active->discount / 100);
                }
                $this->couponId = $this->active->id;
                $this->exist = null;
                if ($this->total < 0) {
                    $this->total = 0;
                }
            }
        } else {
            $this->resetErrorBag();
            $this->addError('cuponNotFound', 'Cupón no encontrado!');
            $this->active = null;
            $this->couponId = null;
        }
    }

    public function clearActive()
    {
        $this->reset('active');
        $this->total = $this->course->price;
    }
}
