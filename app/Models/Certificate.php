<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function certificateable()
    {
        return $this->morphTo();
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }
}
