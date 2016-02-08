<?php

namespace PortalComercial\Http\Controllers;

use Illuminate\Support\Facades\Session;
use PortalComercial\Http\Requests;
use PortalComercial\Cart;
use PortalComercial\Product;

class CartController extends Controller
{

    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        if (!Session::has('cart')):
            Session::set('cart', $this->cart);
        endif;

        return view('store.cart', ['cart' => Session::get('cart')]);
    }

    /**
     *
     *
     * @param $id The Product ID
     * @param Product $prod
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add($id, Product $prod)
    {
        $cart = $this->getCart();

        $product = $prod->find($id);
        $cart->add($id, $product->name, $product->price);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

    /**
     *
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id)
    {
        $cart = $this->getCart();

        $cart->remove($id);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

    /**
     * @return Cart
     */
    public function getCart()
    {
        return (Session::has('cart') ? Session::get('cart') : $this->cart);;
    }

}
