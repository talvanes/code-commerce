@extends('app')

@section('content')
	<div class="container">
		<h1>Upload Image</h1>
		
		{!! Form::open(['route' => ['products.image.store', $product->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
		
		@if($errors->any())
		<ul class="alert">
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
		@endif
		
		{{-- Upload Image --}}
		<div class="form-group">
			{!! Form::label('image', 'Choose Image:') !!}
			{!! Form::file('image', ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::submit('Upload', ['class' => 'btn btn-primary']) !!}
		</div>
		
		{!! Form::close() !!}
		
	</div>
@endsection