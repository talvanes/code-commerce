<?php

namespace PortalComercial\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PortalComercial\Events\CheckoutEvent;
use PortalComercial\Http\Requests;
use PortalComercial\Http\Controllers\Controller;
use PortalComercial\Order;
use PortalComercial\OrderItem;
use PortalComercial\Category;

class CheckoutController extends Controller
{
    public function __construct() {
    }

    public function place(Order $orderModel, Category $cat)
    {

        if (!Session::has('cart')):
            return false;
        endif;

        # bring all categories
        $categories = $cat->all();

        $cart = Session::get('cart');

        if ($cart->getTotal() > 0):
            # create order
            $order = $orderModel->create([
                'user_id' => Auth::user()->id,
                'total' => $cart->getTotal()
            ]);

            # insert items into this order
            foreach($cart->all() as $id => $item):
                $order->items()->create([
                    'product_id' => $id,
                    'price'      => $item['price'],
                    'quantity'   => $item['num']
                ]);
            endforeach;

            # clear cart
            $cart->clear();

            # fire event (email) only if everything worked
            event(new CheckoutEvent(Auth::user(), $order));

            return view('store.checkout', compact('order', 'categories'));

        endif;

        return view('store.checkout', ['order' => null, 'categories' => $categories]);

    }
}
