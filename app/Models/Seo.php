<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable=['modelable_type', 'modelable_id','title', 'seodescription', 'keywords'];
    use HasFactory;
}
