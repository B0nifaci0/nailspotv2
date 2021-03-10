<?php

namespace App\Models;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const VALOR = 1;
    const PORCENTUAL = 2;

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
