<?php

namespace App\Mail;

use App\HeadTeacher;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HeadTeachercreated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $headteacher;
    public $school_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(HeadTeacher $headteacher)
    {
        $this->headteacher = $headteacher;
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
                    ->subject('Welcome to '.$this->school_name)
                    ->view('emails.headteacher.new');
    }
}
