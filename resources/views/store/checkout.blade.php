@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@stop

@section('content')

    <div class="padding-right">
        <div class="container">
            @if( empty($order) )
                <h3>Carrinho de compras vazio!</h3>
            @else
                <h3>Pedido realizado com sucesso!</h3>
                <p>O pedido #{{ $order->id }} foi realizado com sucesso.</p>
            @endif
        </div>
    </div>

@stop