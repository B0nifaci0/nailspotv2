<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Competence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompetenceUser extends Model
{
    use HasFactory;
    protected $table = 'competence_user';
    protected $guarded = ['id'];
    protected $withCount = ['images'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
