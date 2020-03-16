@extends('layouts.master')

@section('content')

	@if($errors->any())
		@foreach($errors->all() as $error)
			{{ $error }}
		@endforeach
	@endif
	
	<form method="POST" action="{{ action('ProjectController@store') }}">
		@csrf

		<input type="text" name="name" id="name" placeholder="Project Name">
		<br>
		<label for="type-solo">Solo</label>
		<input type="radio" name="type" id="type-solo" value="solo">
		<label for="type-shared">Shared</label>
		<input type="radio" name="type" id="type-shared" value="shared">
		<br>
		<input type="number" name="difficulty" id="difficulty" placeholder="Difficulty">
		<input type="submit">

	</form>

@endsection