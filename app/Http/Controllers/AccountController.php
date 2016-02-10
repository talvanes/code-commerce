<?php

namespace PortalComercial\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use PortalComercial\Http\Requests;
use PortalComercial\Order;

class AccountController extends Controller
{
    private static $statuses = [
        0 => 'Em análise',
        1 => 'Aprovado',
        2 => 'Devolvido',
        3 => 'Cancelado',
        4 => 'Completo',
    ];

    public function index() {

    }

    public function orders() {
        # collection all user's orders
        $orders = Auth::user()->orders;

        return view('store.order', compact('orders'));
    }

    public function status(Order $ord, $id) {
        # find order by ID
        $order = $ord->find($id);

        # list of all statuses
        $statuses = self::$statuses;

        return view('store.order.status', compact('order', 'statuses'));
    }

    public function storeStatus(Requests\OrderRequest $request, Order $ord, $id) {
        # get request
        $input = $request->all();

        # find order by ID
        $order = $ord->find($id);

        # update order status
        $order->update($input);

        return redirect()->route('account.orders');
    }
}
