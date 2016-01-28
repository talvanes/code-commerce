<h1>Categorias:</h1>

<ul>
    @foreach($categories as $category)
    <li><b>[{{ $category->name }}]</b> {{ $category->description }}</li>
    @endforeach
</ul>