<h1>Olá!</h1>

<ul>
    @foreach($categories as $category)
    <li>{{ $category->name }}</li>
    @endforeach
</ul>