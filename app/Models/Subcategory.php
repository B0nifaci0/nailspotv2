<?php

namespace App\Models;

use App\Models\Competence;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends Model
{
    use HasFactory;
    use HasProfilePhoto;

    protected $guarded = ['id'];

    public function competences()
    {
        return $this->hasMany(Competence::class);
    }
}
