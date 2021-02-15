<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;

    public function getCompletedAttribute()
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
        return $this->belongsToMany(User::class);
    }

    public function resource()
    {
        return $this->morphOne(Resource::class, 'resourceable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
