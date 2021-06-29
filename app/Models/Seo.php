<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable=['modelable_type', 'modelable_id','title', 'description', 'keywords', 'image', 'type', 'video_thumbnail', 'video_description', 'video_url'];
    use HasFactory;
}
