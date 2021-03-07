<?php

namespace App\Models;

use App\Models\User;
use App\Models\Criterion;
use App\Models\Competence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompetenceCriterionUser extends Model
{
    use HasFactory;

    protected $table = 'competence_criterion_user';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }

    public function criterion()
    {
        return $this->belongsTo(Criterion::class);
    }
}
