<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSchoolFeesReminder extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $school_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->school_name = env('APP_NAME');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
                    ->subject('School Fees Payment Reminder from '.$this->school_name)
                    ->view('emails.students.owing');
    }
}
