<?php

namespace PortalComercial\Listeners;

use Illuminate\Support\Facades\Mail;
use PortalComercial\Events\CheckoutEvent;

class SendEmailCheckout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        // event core: send email
        $user = $event->getUser();
        $order = $event->getOrder();

        # sending email
        Mail::send('emails.checkout', compact('user', 'order'), function ($message) use ($user, $order) {
            $message->from('atendimento@schoolofnet.com.br', "Checkout ID {$order->id} message!");
            $message->to($user->email, $user->name)->subject("Checkout ID {$order->id}: {$user->name}");
        });
    }
}
