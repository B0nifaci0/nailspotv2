<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCompetence extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'category_competence';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }
}
