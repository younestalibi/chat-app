<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $to;
    public $message;
    public $image;
    public $from;
    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($to,$message,$image,$from,$data)
    {
        $this->message=$message;
        $this->to=$to;
        $this->from=$from;
        $this->data=$data;
        $this->image=$image;
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

   
     
    public function broadcastOn()
    {
        return new Channel ('user-'.$this->to);
    }
}
