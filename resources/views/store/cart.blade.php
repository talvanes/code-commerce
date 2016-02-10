@extends('store.store')

@section('content')

    <section class="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <th class="image">Item</th>
                        <th class="description">Description</th>
                        <th class="price">Price</th>
                        <th class="qty">Quantity</th>
                        <th class="total">Total</th>
                        <th></th>
                    </tr>
                    <tfoot>
                    <tr>
                        <td colspan="5">
                            <span style="margin-right: 100px" class="pull-right">Total: R$ {{ number_format($cart->getTotal(), 2, ',', '.') }}</span>
                        </td>
                        <td>
                            <a href="{{ route('checkout.place') }}" class="btn btn-success pull-right">Fechar a conta</a>
                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($cart->all() as $id => $item)
                    <tr>
                        <td class="cart_product">
                            <a href="{{ route('store.product', ['id' => $id]) }}">Image</a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="{{ route('store.product', ['id' => $id]) }}">{{ $item['name'] }}</a></h4>
                            <p>Código: {{ $id }}</p>
                        </td>
                        <td class="cart_price">
                            R$ {{ number_format($item['price'], 2, ',', '.') }}
                        </td>
                        <td class="cart_quantity">{{ $item['num'] }}</td>
                        <td class="cart_total">
                            <p class="cart_total_price">R$ {{ number_format($item['num'] * $item['price'], 2, ',', '.')  }}</p>
                        </td>
                        <td class="cart_delete">
                            <a href="{{ route('cart.remove', ['id' => $id]) }}" class="cart_quantity_delete">Delete</a>
                        </td>
                    </tr>
                    </tbody>
                    @empty
                    <tr>
                        <td colspan="6">
                            <p>No items found.</p>
                        </td>
                    </tr>
                    @endforelse
                    </thead>
                </table>
            </div>
        </div>
    </section>

@stop