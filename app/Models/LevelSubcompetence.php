<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelSubcompetence extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'level_subcompetence';

    public function subcompetence()
    {
        return $this->belongsTo(Subcompetence::class);
    }
}
