<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Bursar;

class Bursarcreated extends Mailable
{
    use Queueable, SerializesModels;

    public $bursar;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Bursar $bursar)
    {
        $this->bursar = $bursar;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@ecopillarsschool.org')->view('emails.bursar.new');
    }
}
