<?php

namespace App\Mail;

use App\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Studentcreated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $student;
    public $school_name;

    /**
     * Create a new message instance.
     *
     * @param Student $student
     * @return void
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
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
                    ->subject('New Student/Pupil Profile on '.$this->school_name)
                    ->view('emails.students.new');
    }
}
