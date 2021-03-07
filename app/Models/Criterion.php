<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\Competence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Criterion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //competence_criterion_user

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'competence_criterion_user')->withPivot('user_id');;
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'competence_criterion_user')->withPivot('competence_id');
    }
}
