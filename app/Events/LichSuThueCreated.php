<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class LichSuThueCreated implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $lichSuThue;
    public $nguoiThue; // Thông tin người thuê

    public function __construct($lichSuThue)
    {
        $this->lichSuThue = $lichSuThue;
        $this->nguoiThue = $lichSuThue->nguoiThue;
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
