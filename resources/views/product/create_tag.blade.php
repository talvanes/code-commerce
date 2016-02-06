@extends('app')

@section('content')
	<div class="container">
		<h1>Define New Tag:</h1>
		
		{!! Form::open(['route' => 'products.tags.store', 'method' => 'post']) !!}
		
		@if($errors->any())
		<ul class="alert">
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
		@endif
		
		{{-- Text Field --}}
		<div class="form-group">
			{!! Form::label('tag', 'Tag Name:') !!}
			{!! Form::text('tag', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
		</div>
		
		{!! Form::close() !!}
		
	</div>
@endsection