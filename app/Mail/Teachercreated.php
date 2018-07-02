<?php

namespace App\Mail;

use App\Teacher;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Teachercreated extends Mailable
{
    use Queueable, SerializesModels;

    public $teacher;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@ecopillarsschool.org')->view('emails.teachers.new');
    }
}
