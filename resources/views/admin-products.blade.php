<h1>Produtos:</h1>

<ul>
    @foreach($products as $product)
    <li><b>[{{ $product->name }}]</b> {{ $product->description }} (R$ {{ number_format($product->price, 2, ',', '.') }})</li>
    @endforeach
</ul>