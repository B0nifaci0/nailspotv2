<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcompetence extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $withCoutn = ['levels', 'users', 'criteria'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_competence_subcompetence');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'criterion_subcompetence_user');
    }
    public function levels()
    {
        return $this->belongsToMany(Level::class);
    }
    public function criteria()
    {
        return $this->belongsToMany(Criterion::class, 'criterion_subcompetence_user');
    }
    public function certificate()
    {
        return $this->morphOne(Certificate::class, 'certificateable');
    }
    public function sales()
    {
        return $this->morphMany(Sale::class, 'saleable');
    }
    public function students()
    {
        return $this->belongsToMany(User::class);
    }
    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'category_competence_subcompetence');
    }
    public function competenceDetails()
    {
        return $this->belongsToMany(Competence::class, 'subcompetence_user');
    }
    public function userDetails()
    {
        return $this->belongsToMany(User::class, 'subcompetence_user');
    }
}
