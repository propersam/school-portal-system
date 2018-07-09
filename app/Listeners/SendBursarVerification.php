<?php

namespace App\Listeners;

use App\Events\NewBursarRegistered;
use App\Mail\Bursarcreated;
use Illuminate\Support\Facades\Mail;

class SendBursarVerification
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
    public function handle(NewBursarRegistered $event)
    {
        Mail::to($event->bursar->user->email)->send(new Bursarcreated($event->bursar));
    }
}
