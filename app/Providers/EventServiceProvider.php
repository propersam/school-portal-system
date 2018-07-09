<?php

namespace App\Providers;

use App\Events\NewAssistantRegistered;
use App\Events\NewBursarRegistered;
use App\Events\NewHeadTeacherRegistered;
use App\Events\NewStudentRegistered;
use App\Events\NewTeacherRegistered;
use App\Listeners\SendActivationCode;
use App\Listeners\SendAssitantVerification;
use App\Listeners\SendBursarVerification;
use App\Listeners\SendHeadTeacherVerification;
use App\Listeners\SendStudentWelcome;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewTeacherRegistered::class => [
            SendActivationCode::class,
        ],
        NewBursarRegistered::class => [
            SendBursarVerification::class,
        ],
        NewHeadTeacherRegistered::class => [
            SendHeadTeacherVerification::class,
        ],
        NewAssistantRegistered::class => [
            SendAssitantVerification::class,
        ],
        NewStudentRegistered::class => [
            SendStudentWelcome::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
