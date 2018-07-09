<?php

namespace App\Listeners;

use App\Events\NewStudentRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Student;
use App\Mail\Studentcreated;
use App\Utils\SmsSender;

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
        $user = $event->student->user;
        if(is_numeric($user->phone)){
            //send sms
            $code = str_random(5);
            SmsSender::sendPhoneVerificationSMS($user->phone, $code);
        }
        
        if(!is_null($user->email)){
            //send mail
            Mail::to($user->email)->send(new Studentcreated($event->bursar));
        }
    }
}
