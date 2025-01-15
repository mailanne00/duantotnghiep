<?php

namespace App\Events;

use App\Models\TinNhan;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TinNhanMoi implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $tinNhan;

    public function __construct(TinNhan $tinNhan)
    {
        $this->tinNhan = $tinNhan;
    }

    public function broadcastOn()
    {
        return ['tin-nhan-moi-channel'];
    }

    public function broadcastAs()
    {
        return 'tin-nhan-moi.updated';
    }
}
