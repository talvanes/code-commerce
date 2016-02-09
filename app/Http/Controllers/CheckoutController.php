<?php

namespace PortalComercial\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use PortalComercial\Http\Requests;
use PortalComercial\Http\Controllers\Controller;
use PortalComercial\Order;
use PortalComercial\OrderItem;

class CheckoutController extends Controller
{
    public function place(Order $orderModel, OrderItem $orderItem)
    {

        if (!Session::has('cart')):
            return false;
        endif;

        $cart = Session::get('cart');

        if ($cart->getTotal() > 0):
            # create order
            $order = $orderModel->create([
                'user_id' => 1,
                'total' => $cart->getTotal()
            ]);

            # insert items into order
            foreach($cart->all() as $id => $item):
                $order->items()->create([
                    'product_id' => $id,
                    'price'      => $item['price'],
                    'quantity'   => $item['num']
                ]);
            endforeach;

            dd($order->items);
        endif;

    }
}
