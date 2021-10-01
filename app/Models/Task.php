<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    const ENTREGADA = 1;
    const CALIFICADA = 2;

    protected $guarded = ['id'];
    protected $withCount = ['taskUser'];

    public function course()
    {
        return $this->belongsTo(Course::class);
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
