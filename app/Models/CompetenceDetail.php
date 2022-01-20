<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetenceDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subcompetence()
    {
        return $this->belongsTo(Subcompetence::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
