<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const VALOR = 1;
    const PORCENTUAL = 2;

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }
}
