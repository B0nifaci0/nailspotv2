<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use App\Models\Coupon;
use App\Models\Competence;
use App\Http\Livewire\Componet;
use App\Models\PaymentPlatform;
use App\Models\SubcompetenceUser;
use App\Models\Level;
use App\Models\Subcompetence;

class CheckoutCompetence extends Componet
{
    protected $listeners = ['render'];
    public $competence, $search, $active, $current, $total, $couponId, $exist, $platforms, $platformCurrent, $competenceId;
    public $category_id, $subcompetences, $level_id, $saleDetail, $subtotal;

    public function mount(Competence $competence)
    {
        $this->competence = $competence;
        $this->competenceId = $competence->id;
        $this->platforms = PaymentPlatform::all();
        $this->platformCurrent = new PaymentPlatform();
        $this->saleDetail = SubcompetenceUser::Where('competence_id', $this->competence->id)
            ->whereStatus(SubcompetenceUser::TEMPORARY)
            ->get();
        $this->total = $this->saleDetail->sum(function ($subcompetence) {
            return $subcompetence->price;
        });
        $this->subtotal = $this->total;
    }
    public function render()
    {
        $this->saleDetail = SubcompetenceUser::Where('competence_id', $this->competence->id)
        ->whereStatus(SubcompetenceUser::TEMPORARY)
        ->get();
        $levels = Level::all();
        $coupon = Coupon::firstWhere('code', $this->search);
        if ($coupon) {
            $this->current = $coupon;
        } else {
            $this->current = null;
        }

        if ($this->competence->image) {
            $this->competence->image->url = $this->getS3URL('competences', $this->competence->id);
        }

        return view('livewire.checkout-competence', compact('levels'));
    }

    public function addCoupon()
    {
        $this->total = $this->saleDetail->sum(function ($subcompetence) {
            return $subcompetence->price;
        });
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
        $this->total = $this->saleDetail->sum(function ($subcompetence) {
            return $subcompetence->price;
        });
        $this->reset('active');
    }

    public function selectPlatform(PaymentPlatform $platform)
    {
        $this->platformCurrent = $platform;
    }

    public function searchSubcompetence()
    {
        $this->subcompetences = Subcompetence::whereHas('levels', function ($query) {
            $query->where('level_id', '=', $this->level);
        })->whereHas('categories', function ($query) {
            $query->where('category_id', '=', $this->category);
        })->whereHas('competences', function ($query) {
            $query->where('competence_id', '=', $this->competence->id);
        })->get();
    }

    public function save($id, $price)
    {
        SubcompetenceUser::create([
            'competence_id' => $this->competence->id,
            'subcompetence_id' => $id,
            'user_id' => auth()->user()->id,
            'level_id' => $this->level,
            'price' => $price
        ]);
        $this->total += $price;
        $this->subtotal += $price;
    }
}
