<?php

namespace App\Models;

use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Database\Eloquent\Model;

class  Nosotros extends Model
{
    use HasProfilePhoto;

    protected $fillable = [
        'about_us',
        'vision',
        'mision',
        'valors',
        'what_do',
        'how_do',
        'own_expert',
        'exp_students',
        'exp_judge',
        'exp_nailspot',
        'video_identify',
        'video_exp_users',
        'video_exp_judge',
        'oficio_yohana',
        'oficio_renato',
        'oficio_aron',
        'cargo_yohana',
        'cargo_renato',
        'cargo_aron',
        'pasatiempo_yohana', 
        'pasatiempo_renato', 
        'pasatiempo_aron',
    ];

    public function getUrlAttribute()
    {
        $url_identify = $this->video_identify;
        $url_identify = explode('=', $url_identify);
        $url_identify = $url_identify[1];
        return $url_identify;

    }

    public function getUrlUsersAttribute()
    {
        $url_exp_users = $this->video_exp_users;
        $url_exp_users = explode('=', $url_exp_users);
        $url_exp_users = $url_exp_users[1];
        return $url_exp_users;

    }

    public function getUrlJudgeAttribute()
    {
        $url_exp_judge = $this->video_exp_judge;
        $url_exp_judge = explode('=', $url_exp_judge);
        $url_exp_judge = $url_exp_judge[1];
        return $url_exp_judge;

    }

}
