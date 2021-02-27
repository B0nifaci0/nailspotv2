<?php

namespace App\Models;

use App\Models\SaleDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cupon extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function saleDetails()
    {
        return $this->belongsToMany(SaleDetail::class);
    }
}
