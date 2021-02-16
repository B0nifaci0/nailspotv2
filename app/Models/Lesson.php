<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;

    const ENTREGADA = 1;
    const CALIFICADA = 3;

    public function getProgressAttribute()
    {
        return $this->users->contains(auth()->user()->id);
    }

    protected $guarded = ['id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('status');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
