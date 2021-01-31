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
        return $this->belongsToMany(Lesson::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
