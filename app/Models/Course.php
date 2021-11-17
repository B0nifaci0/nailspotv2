<?php

namespace App\Models;

use App\Models\Goal;
use App\Models\Task;
use App\Models\User;
use App\Models\Sale; 
use App\Models\Image;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\Comment;
use App\Models\Category;
use App\Traits\SeoModel;
use App\Models\Certificate;
use App\Models\Requirement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    use HasFactory;
    use SeoModel;

    protected $appends=['seo'];

    protected $guarded = ['id', 'status'];
    protected $withCount = ['students', 'reviews', 'sales', 'tasks', 'lessons', 'requirements', 'goals', 'comments'];
    public function getRatingAttribute()
    {
        if ($this->reviews_count) {
            return round($this->reviews->avg('rating'), 1);
        }
        return 6;
    }

    public function getTotalAttribute()
    {
        return $this->sales->sum('final_price');
    }

    public function getFinalAttribute()
    {
        return $this->tasks()->where('final', 1)->count();
    }

    public function scopeCategory($query, $category_id)
    {
        if ($category_id) {
            return $query->whereCategoryId($category_id);
        }
    }

    public function scopeLevel($query, $level_id)
    {
        if ($level_id) {
            return $query->whereLevelId($level_id);
        }
    }
    public function getRouteKeyName()
    {
        return "slug";
    }
    public function getVideoThumbnail(){
        $video=$this->url;
        if($this->platform_id==1){
            $urlArr = explode("/",$video);
            $urlArrNum = count($urlArr);
            $youtubeVideoId = $urlArr[$urlArrNum - 1];
            $thumbURL = 'http://img.youtube.com/vi/'.$youtubeVideoId.'/0.jpg';
            return $thumbURL;   
        }if($this->platform_id==2){ 
            $url = substr(parse_url($video, PHP_URL_PATH), 1);
            $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$url.php"));
            return $hash[0]['thumbnail_large'];  
        }
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function sales()
    {
        return $this->morphMany(Sale::class, 'saleable');
    }

    public function certificate()
    {
        return $this->morphOne(Certificate::class, 'certificateable');
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
    public function payment(){
        return $this->belongsTo(PaymentPlatform::class);
    }
}
