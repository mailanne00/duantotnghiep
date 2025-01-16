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

class NewMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $message;
    public $nguoiGui;
    public $nguoiNhan;

    public function __construct(TinNhan $message, $nguoiGui, $nguoiNhan)
    {
        $this->message = $message;
        $this->nguoiGui = $nguoiGui;
        $this->nguoiNhan = $nguoiNhan;
    }

    public function broadcastOn()
    {
        return new Channel('chat.' . $this->message->phong_chat_id);
    }

    public function broadcastAs()
    {
        return 'new-message';
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message,
            'nguoi_gui' => $this->nguoiGui,
            'nguoi_nhan' => $this->nguoiNhan,
        ];
    }
}
