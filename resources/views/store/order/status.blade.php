@extends('app')

@section('content')
	<div class="container">
		<h1>Set status for Order ID {{ $order->id }}:</h1>
		
		{!! Form::open(['route' => ['account.order.status.store', 'id' => $order->id], 'method' => 'put']) !!}
		
		{{--@if($errors->any())--}}
		{{--<ul class="alert">--}}
			{{--@foreach($errors->all() as $error)--}}
			{{--<li>{{ $error }}</li>--}}
			{{--@endforeach--}}
		{{--</ul>--}}
		{{--@endif--}}
		
		{{-- Select Field: Status --}}
		<div class="form-group">
			{!! Form::label('status', 'Status:') !!}
			{!! Form::select('status', $statuses, null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
		</div>
		
		{!! Form::close() !!}
		
	</div>
@endsection