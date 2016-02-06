@extends('app')

@section('content')
	<div class="container">
		
		<h1>List of tags:</h1>
		
		<p>
			<a href="{{ route('products.tags.create')  }}" class="btn btn-default">Add Tag</a>
		</p>
		
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Action</th>
			</tr>
			@foreach($tags as $tag)
			<tr>
				<td>{{ $tag->id }}</td>
				<td>{{ $tag->name }}</td>
				<td>
					<a href="{{ route('products.tags.delete', ['id' => $tag->id])  }}">Delete</a>
				</td>
			</tr>
			@endforeach
		</table>
		
		{!! $tags->render() !!}
		
	</div>
@endsection