<?php

namespace App\Mail;

use App\HeadTeacher;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HeadTeachercreated extends Mailable
{
    use Queueable, SerializesModels;

    public $headteacher;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(HeadTeacher $headteacher)
    {
        $this->headteacher = $headteacher;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@ecopillarsschool.org')->view('emails.headteacher.new');
    }
}
