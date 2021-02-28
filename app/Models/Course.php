<?php

namespace App\Models;

use App\Models\Goal;
use App\Models\User;
use App\Models\Image;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\Comment;
use App\Models\Category;
use App\Models\SaleDetail;
use App\Models\Requirement;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    use HasFactory;
    use HasProfilePhoto;

    protected $guarded = ['id', 'status'];
    protected $withCount = ['students', 'reviews', 'saleDetails'];

    public function getRatingAttribute()
    {
        if ($this->reviews_count) {
            return round($this->reviews->avg('rating'), 1);
        }
        return 6;
    }

    public function getTotalAttribute()
    {
        return $this->saleDetails->sum('final_price');
    }

    public function scopeCategory($query, $category_id)
    {
        if ($category_id) {
            return $query->whereCategoryId($category_id);
        }
    }
    public function scopeLevel($query, $level_id)
    {
        if ($level_id) {
            return $query->whereLevelId($level_id);
        }
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }
}
