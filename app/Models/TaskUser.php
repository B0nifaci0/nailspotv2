<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskUser extends Model
{
    use HasFactory;

    protected $table = 'task_user';
    protected $withCount = ['images'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
