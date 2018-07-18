<?php

namespace App\Listeners;

use App\Events\NewStudentRegistered;
use App\Mail\Studentcreated;
use App\Student;
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
     * @param  NewStudentRegistered $event
     * @return void
     */
    public function handle(NewStudentRegistered $event)
    {
        /**
         * @var User $user
         */
        $user = $event->student->user();
        /**
         * @var Student $student
         */
        $student = $event->student;
        if (is_object($user) and is_numeric($user->phone)) {
            //send sms
            $code = $user->verifyUser->phone_token;
            $message = 'Your child '.str_limit($student->firstname, 30).
                ' has just applied on Eco-Pillars School Portal. '.
                $code.' is your account verification code.';

            SmsSender::sendSMS($user->phone, $message);
        }

        if ($user->email) {
            //send mail
            Mail::to($user->email)->send(new Studentcreated($event->student));
        }
    }
}
