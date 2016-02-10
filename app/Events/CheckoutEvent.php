<?php

namespace PortalComercial\Events;

use PortalComercial\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use PortalComercial\Order;
use PortalComercial\User;

class CheckoutEvent extends Event
{
    use SerializesModels;

    private $user;
    private $order;

    /**
     * Create a new event instance.
     *
     * @param User
     * @param Order
     */
    public function __construct($user, $order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }


}
