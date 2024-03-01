<?php

namespace App\Events;

use App\Models\orders\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewOrderNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;


    public function __construct(Order $order)
    {
        $this->order = $order;
    }


    public function broadcastOn()
    {
        return new Channel('notifications');
    }


    public function broadcastAs()
    {
        return 'new-order-notification';
    }


    public function broadcastWith()
    {
        return [
            'order_id' => $this->order->id,
            'order_number' => $this->order->number,
            // Add more data as needed
        ];
    }
}
