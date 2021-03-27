<?php

namespace App\Models;

use App\Models\User;
use App\Models\Score;
use App\Models\Criterion;
use App\Models\Competence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompetenceCriterionUser extends Model
{
    use HasFactory;

    protected $table = 'competence_criterion_user';

    protected $guarded = ['id'];

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

    public function scopeExist($query, $request)
    {
        return $query->whereCompetenceId($request->competence_id)
            ->whereCriterionId($request->criterion_id)
            ->whereUserId($request->user_id)->first();
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
