@extends('layouts.master')

@section('title')
	New Block
@endsection

@section('content')
    <ul>
        @foreach ($errors->all() as $error)
        	<li>{{ $error }}</li>
        @endforeach
    </ul>
	<form action="#" method="POST">
		@csrf
		<input type="text" name="data" placeholder="data">

		<input type="submit">
	</form>

@endsection

