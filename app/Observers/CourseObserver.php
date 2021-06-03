<?php

namespace App\Observers;

use App\Models\Course;

class CourseObserver
{
    public function creating(Course $course)
    {
        $url = $course->url;
        if ($course->platform_id == 1) {
            $patron = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i';
            $array = preg_match($patron, $url, $videoId);
            $course->iframe = '<iframe  src="https://www.youtube.com/embed/' . $videoId[1] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        } else {
            $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($patron, $url, $parte);
            $course->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
        }
    }

    public function updating(Course $course)
    {
        $url = $course->url;
        $platform_id = $course->platform_id;
        if ($platform_id == 1) {
            $patron = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i';
            $array = preg_match($patron, $url, $videoId);
            $course->iframe = '<iframe  src="https://www.youtube.com/embed/' . $videoId[1] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        } else {
            $patron = "/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/";
            $array = preg_match($patron, $url, $parte);
            $course->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
        }
    }
}
