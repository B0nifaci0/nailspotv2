<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const PENDING = 0;
    const APPROVAL = 1;

    public function saleable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function scopyExist($query, $user_id, $coupon_id)
    {
        return $query->whereUserId($user_id)
            ->whereCouponId($coupon_id);
    }
}
