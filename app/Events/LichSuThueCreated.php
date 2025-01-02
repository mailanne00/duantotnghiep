<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LichSuThueCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $lichSuThue;
    /**
     * Create a new event instance.
     */
    public function __construct($lichSuThue)
    {
        $this->lichSuThue = $lichSuThue;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel('lichSuThues');
    }

    public function broadcastWith()
    {
        return [
            'nguoi_thue' => $this->lichSuThue->nguoi_thue,
            'gia_thue' => $this->lichSuThue->gia_thue,
            'gio_thue' => $this->lichSuThue->gio_thue
        ];
    }
}
