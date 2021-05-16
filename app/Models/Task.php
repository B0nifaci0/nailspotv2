<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    const ENTREGADA = 1;
    const CALIFICADA = 2;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return "title";
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function taskUser()
    {
        return $this->hasMany(TaskUser::class);
    }
}
