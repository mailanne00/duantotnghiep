<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class LichSuThueCreated implements ShouldBroadcast
{
    use InteractsWithSockets;

    public $lichSuThue;

    public function __construct($lichSuThue)
    {
        $this->lichSuThue = $lichSuThue;
    }

    public function broadcastOn()
    {
        return ['lich-su-thue-channel'];
    }

    public function broadcastAs()
    {
        return 'lich-su-thue.updated';
    }
}
