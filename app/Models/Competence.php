<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Image;
use App\Models\Level;
use App\Models\Subcategory;
use Laravel\Jetstream\HasProfilePhoto;
use App\Models\CompetenceCriterionUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competence extends Model
{
    use HasFactory;
    use HasProfilePhoto;

    protected $guarded = ['id'];


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

    public function setStartDateAttribute($value)
    {

        $this->attributes['start_date'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
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

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }


    //competence_criterion_user

    public function criteria()
    {
        return $this->hasMany(CompetenceCriterionUser::class);
    }
    public function users()
    {
        return $this->hasMany(CompetenceCriterionUser::class);
    }
}
