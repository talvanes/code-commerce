<?php

namespace PortalComercial\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;
use PHPSC\PagSeguro\Items\Item;
use PortalComercial\Category;
use PortalComercial\Events\CheckoutEvent;
use PortalComercial\Http\Requests;
use PortalComercial\Order;

class CheckoutController extends Controller
{
    public function __construct() {
    }

    public function place(Order $orderModel, Category $cat, CheckoutService $checkoutService)
    {

        if (!Session::has('cart')):
            return false;
        endif;

        # bring all categories
        $categories = $cat->all();

        $cart = Session::get('cart');

        if ($cart->getTotal() > 0):

            $checkoutBuilder = $checkoutService->createCheckoutBuilder();

            # create order
            $order = $orderModel->create([
                'user_id' => Auth::user()->id,
                'total' => $cart->getTotal()
            ]);

            # insert items into this order
            foreach($cart->all() as $id => $item):

                $checkoutBuilder->addItem(new Item($item['num'], $item['name'], $item['price']));

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

            $checkout = $checkoutBuilder->getCheckout();
            $response = $checkoutService->checkout($checkout);

            # PagSeguro site redirect
            return redirect($response->getRedirectionUrl());
            //return view('store.checkout', compact('order', 'categories'));
        endif;

        return view('store.checkout', ['order' => null, 'categories' => $categories]);

    }

    /**
     * Test routine using UOL's PagSeguro
     *
     * @param CheckoutService $checkoutService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function teste(CheckoutService $checkoutService)
    {

        $checkout = $checkoutService->createCheckoutBuilder()
            ->addItem(new Item(1, 'Televisão LED 500', 8999.99))
            ->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99))
            ->getCheckout();

        $response = $checkoutService->checkout($checkout);

        return redirect($response->getRedirectionUrl());

    }
}
