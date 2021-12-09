<?php

namespace App\Policies;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use App\Models\Competence;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompetencePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function published(?User $user, Competence $competence)
    {
        if ($competence->status == 2 && $competence->end_date >= Carbon::today()) {
            return true;
        }
        return false;
    }

    public function enrolled(User $user, Competence $competence)
    {
        return $competence->students->contains($user->id);
    }
}
