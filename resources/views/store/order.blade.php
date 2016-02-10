@extends('store.store')

@section('content')

    <div class="container">
        <h3>Meus pedidos:</h3>

        <table class="table">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Items</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td><b>{{ $order->id }}</b></td>
                    <td>
                        <ul>
                        @foreach($order->items as $item)
                            <li>{{ $item->product->name }}</li>
                        @endforeach
                        </ul>
                    </td>
                    <td>R$ {{ number_format($order->total, 2, ',', '.') }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="{{ route('account.order.status', ['id' => $order->id]) }}" class="btn btn-link">Status</a>
                    </td>
                </tr>
            @empty
                <p>There are no orders done by this user!</p>
            @endforelse
            </tbody>
        </table>
    </div>

@stop