<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class confirmationMSGEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $phone;
    public $randomNumber;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($randomNumber,$phone)
    {
        $this->phone=$phone;
        $this->randomNumber=$randomNumber;
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
