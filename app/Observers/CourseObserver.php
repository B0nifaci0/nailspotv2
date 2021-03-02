<?php

namespace App\Observers;

use App\Models\Course;

class CourseObserver
{
    public function creating(Course $course)
    {
        $url = $course->url;
        $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
        $array = preg_match($patron, $url, $parte);
        $course->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
    }

    public function updating(Course $course)
    {
        $url = $course->url;
        $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
        $array = preg_match($patron, $url, $parte);
        $course->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
    }

    /**
     * Handle the Course "deleted" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function deleted(Course $course)
    {
        //
    }

    /**
     * Handle the Course "restored" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function restored(Course $course)
    {
        //
    }

    /**
     * Handle the Course "force deleted" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function forceDeleted(Course $course)
    {
        //
    }
}
