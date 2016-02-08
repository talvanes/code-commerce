@extends('app')

@section('content')
    <div class="container">

        <h1>List of tags: {{ $product->name }}</h1>

        <p>
            <a href="{{ route('product.tags.add', ['id' => $product->id]) }}" class="btn btn-default">Add Tag</a>
        </p>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            @if(isset($tags))
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <a href="{{ route('product.tags.delete', ['id' => $product->id, 'tag' => $tag->id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>

        <p>
            <a href="{{ route('products') }}" class="btn btn-default">Voltar</a>
        </p>

        {{--{!! $tags->render() !!}--}}

    </div>
@endsection