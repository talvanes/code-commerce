{{-- Email View --}}
@section ('content')
    <p>
        Dear user <strong>{{ $user->name }}</strong>, your checkout has just been sent to
        <em><a href="#" title="Check if it's correct">{{ $user->email }}</a></em>
    </p>
    <p>So, here are your items for order id #{{ $order->id }}:</p>
    <ul>
    @foreach($order->items as $item)
        <li>{{ $item->product->name }} [{{ $item->product->quantity }}]: R$ {{ number_format($item->product->price * $item->product->quantity, 2, ',', '.') }}</li>
    @endforeach
    </ul>
    <p>Total: R$ {{ number_format($order->total, 2, ',', '.') }}</p>
@endsection