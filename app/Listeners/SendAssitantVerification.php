<?php

namespace App\Listeners;

use App\Events\NewAssistantRegistered;
use App\Mail\Assistantcreated;
use Illuminate\Support\Facades\Mail;

class SendAssitantVerification
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
     * @param  NewAssistantRegistered  $event
     * @return void
     */
    public function handle(NewAssistantRegistered $event)
    {
        Mail::to($event->assistant->user->email)->send(new Assistantcreated($event->assistant));
    }
}
