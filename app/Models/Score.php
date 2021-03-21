<?php

namespace App\Models;

use App\Models\CompetenceUser;
use App\Models\CompetenceCriterionUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Score extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function competenceUser()
    {
        return $this->belongsTo(CompetenceUser::class);
    }

    public function competenceCriterionUser()
    {
        return $this->belongsTo(CompetenceCriterionUser::class);
    }
}
