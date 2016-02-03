@extends('app')

@section('content')
	<div class="container">
		
		<h1>Products:</h1>
		
		<p><a href="{{ route('products.create') }}" class="btn btn-default">New Product</a></p>
		
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Category</th>
<<<<<<< HEAD
				<th>Bought By</th>
=======
>>>>>>> 12d284a521f8d542aeb4d91f70ebd93758e05806
				<th>Action</th>
			</tr>
			@foreach($products as $product)
			<tr>
				<td>{{ $product->id }}</td>
				<td>{{ $product->name }}</td>
				<td>{{ $product->description }}</td>
				<td>{{ number_format($product->price, 2, ',', '.') }}</td>
				<td>{{ $product->category->name }}</td>
<<<<<<< HEAD
				<td>{{ $product->user->name  }}</td>
=======
>>>>>>> 12d284a521f8d542aeb4d91f70ebd93758e05806
				<td>
					<a href="{{ route('products.edit', ['id' => $product->id]) }}">Edit</a> |
					<a href="{{ route('products.destroy', ['id' => $product->id]) }}">Delete</a>
				</td>
			</tr>
			@endforeach
		</table>
		
		{!! $products->render() !!}
		
	</div>
@endsection