<?php

namespace App\Mail;

use App\Bursar;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Bursarcreated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $bursar;
    public $school_name;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Bursar $bursar)
    {
        $this->bursar = $bursar;
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
                    ->view('emails.bursar.new');
    }
}
