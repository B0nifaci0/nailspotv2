<?php

namespace App\Models;

use App\Models\User;
use App\Models\Competence;
use App\Models\CompetenceCriterionUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Criterion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function subcompetences()
    {
        return $this->belongsToMany(Subcompetence::class, 'criterion_subcompetence_user');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'criterion_subcompetence_user');
    }
}
