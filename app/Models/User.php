<?php

namespace App\Models;

use App\Models\Task;
use App\Models\Course;
use App\Models\Review;
use App\Models\Profile;
use App\Models\Criterion;
use App\Models\Competence;
use App\Models\SaleDetail;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
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

    public function competences_dictated()
    {
        return $this->hasMany(Course::class);
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

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
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
        return $this->belongsToMany(Criterion::class, 'competence_criterion_user')->withPivot('competence_id');;
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'competence_criterion_user')->withPivot('criterion_id');;
    }
}
