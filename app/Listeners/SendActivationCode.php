<?php

namespace App\Listeners;

use App\Events\NewTeacherRegistered;
use App\Mail\Teachercreated;
use Illuminate\Support\Facades\Mail;

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
        Mail::to($event->teacher->user->email)->send(new Teachercreated($event->teacher));
    }
}
