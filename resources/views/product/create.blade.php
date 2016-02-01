@extends('app')

@section('content')
	<div class="container">
		<h1>Create Product</h1>
		
		{!! Form::open(['route' => 'products.store']) !!}
		
		@if($errors->any())
		<ul class="alert">
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
		@endif
		
		<div class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('description', 'Description:') !!}
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			<div class="row">
				<div class="col-md-4 col-sm-12">
					{!! Form::label('price', 'Price:') !!}
					{!! Form::input('number', 'price', null, ['class' => 'form-control']) !!}
				</div>
				<div class="col-md-4 col-sm-12">
					{!! Form::label('featured', 'Featured:') !!}
					{!! Form::checkbox('featured', 0, null, ['min' => 0, 'max' => 999999]) !!}
				</div>
				<div class="col-md-4 col-sm-12">
					{!! Form::label('recommend', 'Recommended:') !!}
					{!! Form::checkbox('recommend', 0, null, ['min' => 0, 'max' => 999999]) !!}
				</div>
			</div>
			
		</div>
		
		<div class="form-group">
			{!! Form::submit('Add Product', ['class' => 'btn btn-primary']) !!}
		</div>
		
		{!! Form::close() !!}
		
	</div>
@endsection