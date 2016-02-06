@extends('app')

@section('content')
	<div class="container">
		<h1>Define Tags for Product ID {{ $id }}:</h1>
		
		{!! Form::open(['route' => ['product.tags.store', 'id' => $id], 'method' => 'post']) !!}
		
		@if($errors->any())
		<ul class="alert">
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
		@endif
		
		{{-- Text Field --}}
		<div class="form-group">
			{!! Form::label('tag', 'Tag:') !!}
			{!! Form::select('tag', $tags, null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
		</div>
		
		{!! Form::close() !!}
		
	</div>
@endsection