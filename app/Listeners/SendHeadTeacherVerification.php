<?php

namespace App\Listeners;

use App\Events\NewHeadTeacherRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\HeadTeacher;
use App\Mail\HeadTeachercreated;

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
