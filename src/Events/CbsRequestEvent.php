<?php

namespace TNM\CBS\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CbsRequestEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public array $attributes;
    public string $service;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $attributes, string $service)
    {
        $this->attributes = $attributes;
        $this->service = $service;
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
