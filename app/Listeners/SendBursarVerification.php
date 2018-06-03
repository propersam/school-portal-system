<?php

namespace App\Listeners;

use App\Events\NewBursarRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Bursar;
use App\Mail\Bursarcreated;

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
        Mail::to($event->bursar->getEmail())->send(new Bursarcreated($event->bursar));
    }
}
