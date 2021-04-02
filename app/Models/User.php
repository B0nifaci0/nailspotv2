<?php

namespace App\Models;

use App\Models\Sale;
use App\Models\Task;
use App\Models\Course;
use App\Models\Review;
use App\Models\Profile;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use App\Models\CompetenceCriterionUser;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use HasRoles;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'level_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function courses_dictated()
    {
        return $this->hasMany(Course::class);
    }

    public function courses_enrolled()
    {
        return $this->belongsToMany(Course::class);
    }

    public function competences_enrolled()
    {
        return $this->belongsToMany(Course::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function adminlte_image()
    {
        return $this->profile_photo_url;
    }

    public function adminlte_desc()
    {
        if ($this->hasRole('Admin')) {
            return 'Administrador';
        } else if ($this->hasRole('Instructor')) {
            return 'Instructor';
        }
    }

    //competence_criterion_user

    public function criteria()
    {
        return $this->belongsToMany(Criterion::class, 'competence_criterion_user');
    }
    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'competence_criterion_user');
    }
}
