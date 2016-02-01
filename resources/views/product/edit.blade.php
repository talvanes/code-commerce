@extends('app')

@section('content')
	<div class="container">
		<h1>Editing Product: {{ $product->name }}</h1>
		
		{!! Form::open(['route' => ['products.update', $product->id], 'method' => 'put']) !!}
		
		@if($errors->any())
		<ul class="alert">
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
		@endif
		
		<div class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('description', 'Description:') !!}
			{!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			<div class="row">
				<div class="col-md-4 col-sm-12">
					{!! Form::label('price', 'Price:') !!}
					{!! Form::input('number', 'price', $product->price, ['class' => 'form-control']) !!}
				</div>
				<div class="col-md-4 col-sm-12">
					{!! Form::label('featured', 'Featured:') !!}
					{!! Form::checkbox('featured', $product->featured, ($product->featured ? 'checked' : ''), ['min' => 1, 'max' => 999999]) !!}
				</div>
				<div class="col-md-4 col-sm-12">
					{!! Form::label('recommend', 'Recommended:') !!}
					{!! Form::checkbox('recommend', $product->recommend, ($product->recommend ? 'checked' : ''), ['min' => 1, 'max' => 999999]) !!}
				</div>
			</div>
			
		</div>
		
		<div class="form-group">
			{!! Form::submit('Save Product', ['class' => 'btn btn-primary']) !!}
		</div>
		
		{!! Form::close() !!}
		
	</div>
@endsection