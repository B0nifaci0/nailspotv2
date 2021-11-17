<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use App\Models\Coupon;
use App\Models\Competence;
use App\Http\Livewire\Componet;
use App\Models\PaymentPlatform;

class CheckoutCompetence extends Componet
{
    public $competence, $search, $active, $current, $total, $couponId, $exist, $platforms, $platformCurrent, $competenceId;

    public function mount(Competence $competence)
    {
        $this->competence = $competence;
        $this->competenceId = $competence->id;
        $this->total = $competence->price;
        $this->platforms = PaymentPlatform::all();
        $this->platformCurrent = new PaymentPlatform();
    }

    public function render()
    {
        $coupon = Coupon::firstWhere('code', $this->search);
        if ($coupon) {
            $this->current = $coupon;
        } else {
            $this->current = null;
        }

         if ($this->competence->image) {
            $this->competence->image->url = $this->getS3URL('competences', $this->competence->id);
        }
        
        return view('livewire.checkout-competence');
    }

    public function addCoupon()
    {
        $this->total = $this->competence->price;
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
        $this->total = $this->competence->price;
    }

    public function selectPlatform(PaymentPlatform $platform)
    {
        $this->platformCurrent = $platform;
    }
}
