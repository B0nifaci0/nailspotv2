<?php

namespace App\Policies;

use App\Models\Competence;
use App\Models\User;
use App\Models\Course;
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
        if ($competence->status == 2) {
            return true;
        }
        return false;
    }

    public function enrolled(User $user, Competence $competence)
    {
        return $competence->students->contains($user->id);
    }
}
