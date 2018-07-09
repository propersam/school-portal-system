<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\NewTeacherRegistered' => [
            'App\Listeners\SendActivationCode',
        ],
        'App\Events\NewBursarRegistered' => [
            'App\Listeners\SendBursarVerification',
        ],
        'App\Events\NewHeadTeacherRegistered' => [
            'App\Listeners\SendHeadTeacherVerification',
        ],
        'App\Events\NewAssistantRegistered' => [
            'App\Listeners\SendAssitantVerification',
        ],
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
