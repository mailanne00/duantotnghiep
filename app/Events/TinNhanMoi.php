<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\TinNhan;

class TinNhanMoi implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $tinNhan;

    public function __construct(TinNhan $tinNhan)
    {
        $this->tinNhan = $tinNhan;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('phong-chat.' . $this->tinNhan->phong_chat_id);
    }
}
