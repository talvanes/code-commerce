@extends('app')

@section('content')
	<div class="container">
		<h1>Create Product</h1>
		
		{!! Form::open(['route' => 'products.store', 'method' => 'post']) !!}
		
		@if($errors->any())
		<ul class="alert">
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
		@endif
		
		{{-- Category ID --}}
		<div class="form-group">
			{!! Form::label('category', 'Category:') !!}
			{!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
		</div>

		{{-- User ID --}}
		<div class="form-group">
			{!! Form::label('user', 'Consumer:') !!}
			{!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('category', 'Category:') !!}
			{!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('description', 'Description:') !!}
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('price', 'Price:') !!}
<<<<<<< HEAD
			{!! Form::input('number', 'price', null, ['class' => 'form-control', 'min' => 100, 'max' => 1000000]) !!}
=======
			{!! Form::input('number', 'price', null, ['class' => 'form-control']) !!}
>>>>>>> 12d284a521f8d542aeb4d91f70ebd93758e05806
		</div>
		
		<div class="form-group">
			{!! Form::label('featured', 'Featured:', ['class' => 'checkbox-inline']) !!}
			{!! Form::checkbox('featured', 0, null) !!}
			
			{!! Form::label('recommend', 'Recommended:', ['class' => 'checkbox-inline']) !!}
			{!! Form::checkbox('recommend', 0, null) !!}
		</div>
		
		<div class="form-group">
			{!! Form::submit('Add Product', ['class' => 'btn btn-primary']) !!}
		</div>
		
		{!! Form::close() !!}
		
	</div>
@endsection