<?php

namespace App\Models;

use App\Models\User;
use App\Models\Coupon;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
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
