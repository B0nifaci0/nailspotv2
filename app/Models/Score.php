<?php

namespace App\Models;

use App\Models\Subcompetence;
use App\Models\CompetenceDetail;
use App\Models\CompetenceCriterionUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Score extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function subcompetenceUser()
    {
        return $this->belongsTo(SubcompetenceUser::class);
    }

    public function criterionSubcompetenceUser()
    {
        return $this->belongsTo(CriterionSubcompetenceUser::class);
    }
}
