<?php

namespace App\Observers;

use App\Models\Lesson;

class LessonObserver
{

    public function creating(Lesson $lesson)
    {
        $url = $lesson->url;
        $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
        $array = preg_match($patron, $url, $parte);
        $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
    }

    public function updating(Lesson $lesson)
    {
        $url = $lesson->url;
        $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
        $array = preg_match($patron, $url, $parte);
        $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
    }
}
