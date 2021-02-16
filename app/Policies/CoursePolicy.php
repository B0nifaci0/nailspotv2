<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
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

    public function enrolled(User $user, Course $course)
    {
        return $course->students->contains($user->id);
    }

    public function published(?User $user, Course $course)
    {
        if ($course->status == 3) {
            return true;
        }
        return false;
    }

    public function dicatated(User $user, Course $course)
    {
        if ($course->user_id == $user->id) {
            return true;
        }
        return false;
    }

    public function valued(User $user, Course $course)
    {
        if (Review::whereUserId($user->id)->whereCourseId($course->id)->count()) {
            return false;
        }
        return true;
    }
    public function revision(User $user, Course $course)
    {
        if ($course->status == 2) {
            return true;
        }
        return false;
    }
}
