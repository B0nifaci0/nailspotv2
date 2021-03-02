<?php

namespace App\Models;

use App\Models\User;
use App\Models\Level;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competence extends Model
{
    use HasFactory;


    public function getRouteKeyName()
    {
        return "slug";
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
