<?php

namespace App\Providers;

use App\Events\UserNotification;
use App\Listeners\SendNotification;
use App\Models\Course;
use App\Models\Competence;
use App\Observers\CourseObserver;
use App\Observers\CompetenceObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserNotification::class=>[
            SendNotification::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Competence::observe(CompetenceObserver::class);
        Course::observe(CourseObserver::class);
    }
}
