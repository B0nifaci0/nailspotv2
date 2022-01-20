<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriterionSubcompetenceUser extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'criterion_subcompetence_user';

    public function scopeExist($query, $request)
    {
        return $query->whereCriterionId($request->criterion_id)
            ->whereSubcompetenceId($request->subcompetence_id)
            ->whereUserId($request->user_id)->first();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subcompetence()
    {
        return $this->belongsTo(Subcompetence::class);
    }
    public function criterion()
    {
        return $this->belongsTo(Criterion::class);
    }
}
