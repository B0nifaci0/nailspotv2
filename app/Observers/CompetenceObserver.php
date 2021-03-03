<?php

namespace App\Observers;

use App\Models\Competence;

class CompetenceObserver
{
    public function creating(Competence $competence)
    {
        $url = $competence->url;

        $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
        $array = preg_match($patron, $url, $parte);
        $competence->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $parte[1] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }

    public function updating(Competence $competence)
    {
        $url = $competence->url;
        $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
        $array = preg_match($patron, $url, $parte);
        $competence->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $parte[1] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }

    /**
     * Handle the Competence "deleted" event.
     *
     * @param  \App\Models\Competence  $competence
     * @return void
     */
    public function deleted(Competence $competence)
    {
        //
    }

    /**
     * Handle the Competence "restored" event.
     *
     * @param  \App\Models\Competence  $competence
     * @return void
     */
    public function restored(Competence $competence)
    {
        //
    }

    /**
     * Handle the Competence "force deleted" event.
     *
     * @param  \App\Models\Competence  $competence
     * @return void
     */
    public function forceDeleted(Competence $competence)
    {
        //
    }
}
