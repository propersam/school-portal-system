<?php

namespace App\Listeners;

use App\Events\NewTeacherRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Teacher;
use App\Mail\Teachercreated;

class SendActivationCode
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewTeacherRegistered  $event
     * @return void
     */
    public function handle(NewTeacherRegistered $event)
    {
        
        Mail::to($event->teacher->getEmail())->send(new Teachercreated($event->teacher));
    }
}
