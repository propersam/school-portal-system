<?php

namespace App\Events;

use App\Teacher;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewTeacherRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $teacher;



    /**
     * Create a new event instance.
     *
     * @return void

     */
    public function __construct( Teacher $teacher)
    {
        //
        $this->teacher = $teacher;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
