@extends('layouts.master')

@section('content')

	@if($errors->any())
		@foreach($errors->all() as $error)
			{{ $error }}
		@endforeach
	@endif
	
	<form method="POST" action="{{ route('TransactionController@store') }}">
		@csrf

		<input type="text" name="data" id="data" placeholder='Json ["data"]'>
		<input type="submit">

	</form>

@endsection