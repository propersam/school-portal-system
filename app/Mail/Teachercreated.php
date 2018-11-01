<?php

namespace App\Mail;

use App\Teacher;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Teachercreated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $teacher;
    public $school_name;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
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
                    ->view('emails.teachers.new');
    }
}
