<?php

namespace App\Models;

use App\Models\CompetenceCriterionUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Criterion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //competence_criterion_user

    public function competences()
    {
        return $this->hasMany(CompetenceCriterionUser::class);
    }
    public function users()
    {
        return $this->hasMany(CompetenceCriterionUser::class);
    }
}
