<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MeetingSignalSent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $message;
    public $meetingId;
    public $userId;
    public function __construct($message, $meetingId, $userId)
{
    $this->message = $message;
    $this->meetingId = $meetingId;
    $this->userId = $userId;
}

public function broadcastWith()
{
    return [
        'message' => $this->message,
        'userId' => $this->userId
    ];
}
}
