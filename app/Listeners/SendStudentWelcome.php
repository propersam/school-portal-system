<?php

namespace App\Listeners;

use App\Events\NewStudentRegistered;
use App\Mail\Studentcreated;
use App\User;
use App\Utils\SmsSender;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendStudentWelcome implements ShouldQueue
{
    use Queueable;

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
     * @param  NewBursarRegistered $event
     * @return void
     */
    public function handle(NewStudentRegistered $event)
    {
        /**
         * @var User $user
         */
        $user = $event->student->user();
        if (is_numeric($user->phone)) {
            //send sms
            $code = $user->verifyUser->phone_token;
            SmsSender::sendPhoneVerificationSMS($user->phone, $code);
        }

        if (!is_null($user->email)) {
            //send mail
            Mail::to($user->email)->send(new Studentcreated($event->student));
        }
    }
}
