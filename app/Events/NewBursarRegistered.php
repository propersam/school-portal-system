<?php

namespace App\Events;

use App\Bursar;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewBursarRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $bursar;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Bursar $bursar)
    {
        $this->bursar = $bursar;
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
