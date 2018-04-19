<?php

namespace App\Listeners;

use App\Events\NewAssistantRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Assistant;
use App\Mail\Assistantcreated;

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
        Mail::to($event->assistant->getEmail())->send(new Assistantcreated($event->assistant));
    }
}
