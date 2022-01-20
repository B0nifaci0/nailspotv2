<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCompetenceSubcompetence extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'category_competence_subcompetence';

    public function subcompetence()
    {
        return $this->belongsTo(Subcompetence::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }

    public function levels()
    {
        return $this->belongsTo(Level::class);
    }
}
