<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\User;
use App\Models\Image;
use App\Models\Level;
use App\Models\Criterion;
use App\Models\Certificate;
use App\Models\Requirement;
use App\Models\Subcategory;
use App\Models\CompetenceCriterionUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competence extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;
    const FINALIZADO = 3;

    protected $guarded = ['id'];
    protected $withCount = ['students', 'criteria', 'categories', 'subcompetences'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function scopeSubcategory($query, $subcategory_id)
    {
        if ($subcategory_id) {
            return $query->whereSubcategoryId($subcategory_id);
        }
    }

    public function scopeLevel($query, $level_id)
    {
        if ($level_id) {
            return $query->whereLevelId($level_id);
        }
    }

    public function scopeStatus($query, $status)
    {
        if ($status) {
            return $query->whereStatus($status);
        }
    }

    public function getTotalAttribute()
    {
        return $this->sales->sum('final_price');
    }

    public function getScoreAttribute()
    {
        return $this->criteria_count * 10;
    }

    //Competence_student
    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function criteria()
    {
        return $this->belongsToMany(Criterion::class, 'competence_criterion_user');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'competence_criterion_user');
    }

    public function competenceCriterionUser()
    {
        return $this->hasMany(CompetenceCriterionUser::class);
    }

    public function certificate()
    {
        return $this->morphOne(Certificate::class, 'certificateable');
    }

    public function requirements()
    {
        return $this->morphMany(Requirement::class, "requirementable");
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function subcompetences()
    {
        return $this->belongsToMany(Subcompetence::class, 'category_competence_subcompetence');
    }
    public function categoryCompetenceSubcompetence()
    {
        return $this->hasMany(CategoryCompetenceSubcompetence::class);
    }
    public function sales()
    {
        return $this->morphMany(Sale::class, 'saleable');
    }
    public function subcompetencesDetails()
    {
        return $this->belongsToMany(Subcompetence::class, 'subcompetence_user');
    }
    public function userDetails()
    {
        return $this->belongsToMany(User::class, 'subcompetence_user');
    }
}
