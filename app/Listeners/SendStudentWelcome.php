<?php

namespace App\Listeners;

use App\Events\NewStudentRegistered;
use App\Mail\Studentcreated;
use Illuminate\Support\Facades\Mail;

class SendStudentWelcome
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
     * @param  NewBursarRegistered  $event
     * @return void
     */
    public function handle(NewStudentRegistered $event)
    {
        Mail::to($event->student->user->email)->send(new Studentcreated($event->bursar));
    }
}
