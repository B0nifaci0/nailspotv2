<?php

namespace App\Models;

use App\Models\Requirement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Goal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }
}
