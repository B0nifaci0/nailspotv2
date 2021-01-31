<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{

    use HasFactory;
    use HasProfilePhoto;

    protected $fillable = [
        'course_id',
        'user_id',
        'status',
        'score',
        'teacher_comment',
        'student_comment',
        'assignment_photo_path'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
