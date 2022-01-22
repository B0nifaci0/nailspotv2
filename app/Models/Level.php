<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $withCount = ['subcompetence'];

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function subcompetence()
    {
        return $this->belongsToMany(Subcompetence::class);
    }

    public function competenceDeatils()
    {
        return $this->belongsTo(SubcompetenceUser::class);
    }
}
