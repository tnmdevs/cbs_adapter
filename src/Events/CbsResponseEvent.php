<?php

namespace TNM\CBS\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use TNM\CBS\Responses\CbsResponse;

class CbsResponseEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public array $attributes;
    public CbsResponse $response;

    public function __construct(array $attributes, CbsResponse $response)
    {
        $this->attributes = $attributes;
        $this->response = $response;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
