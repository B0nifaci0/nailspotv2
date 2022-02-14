<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcompetenceUser extends Model
{
    use HasFactory;

    const TEMPORARY = 1;
    const PENDING = 2;
    const APROVED = 3;

    protected $guarded = ['id'];
    protected $table = 'subcompetence_user';
    protected $withCount = ['images'];

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

    public function getFinalScoreAttribute(){
        return $this->scores->avg(function($score){
            return $score->value;
        });
    }
}
