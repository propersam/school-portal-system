<?php

namespace App\Listeners;

use App\Events\NewHeadTeacherRegistered;
use App\Mail\HeadTeachercreated;
use Illuminate\Support\Facades\Mail;

class SendHeadTeacherVerification
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
     * @param  NewHeadTeacherRegistered  $event
     * @return void
     */
    public function handle(NewHeadTeacherRegistered $event)
    {
       return Mail::to($event->headteacher->user->email)->send(new HeadTeachercreated($event->headteacher));
    }
}
